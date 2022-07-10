<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use App\Models\AutoCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CardRechargeRequest;

class RechargeController extends Controller
{
    public function rechargeCard()
    {
        $history_card = AutoCard::where('username',Auth::user()->username)
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('clients.Napcard',compact('history_card'));
    }
    public function cardSubmit(CardRechargeRequest $request)
    {
         $order_id = randStr();
         $xuly  = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(websetting('url_gachcard'), [
            'telco' => $request->telco,
            'code' => $request->code,
            'serial' => $request->serial,
            'amount' => $request->amount,
            'request_id' => $order_id,
            'partner_id' => websetting('partner_id'),
            'sign' => md5(websetting('partner_key').$request->code.$request->serial),
            'command' => 'charging',
        ]);
         $getbody = json_decode($xuly->body(),true);
        if ($getbody['status'] == 99 ) {
            $saveGD = AutoCard::create([
                'order_id' =>  $order_id,
                'username' =>  Auth::user()->username,
                'telco' => $request->telco,
                'serial' =>  $request->serial,
                'code' =>  $request->code,
                'amount' =>  $request->amount,
                'receive_amount' => $request->amount - $request->amount * websetting('ck_card')/100,
                'status' =>  $getbody['message']
              ]);
            return response()->json(['status'=>'success','message'=>'Nạp thẻ thành công, vui lòng đợi hệ thống xử lý trong vài giây']);
        }
         
          return response()->json(['status'=>'fails','message'=>$getbody]);
    }

    public function callback_card(Request $request)
    {
        if ($request->callback_sign && $request->status) {
            $code = $request->code;
            $serial = $request->serial;
            $telco = $request->telco;
            $amount = $request->amount; ///số tiền nhận được
            $value = $request->value; ///giá trị thực
            ///kiểm tra xem code và serial có trong database không
          $checkCard = AutoCard::where('code', $code)
           ->where('serial', $serial)
           ->where('telco', $telco)
           ->where('status','PENDING')
           ->firstOrFail();
           
          if ($request->status == 1) {
            $setSuccessCard = $checkCard->update([
                'status' => 'SUCCESS',  
                'note'   => 'xử lý hoàn tất'
            ]);
            /// CỘNG TIỀN CHO USER
           $userID = User::where('username',$checkCard->username)->first();
           $addMoney = $userID->update([
                'balance' => $userID->balance + $checkCard->receive_amount,
                'total_recharge' => $userID->total_recharge + $checkCard->receive_amount,
           ]);

          }elseif ($request->status == 2) {
            $setSuccessCard = $checkCard->update([
                'status' => 'SUCCESS',
                'note'   => 'Thẻ sai mệnh giá -50% +'.number_format($checkCard->receive_amount * 50 / 100).' coin' ,
            ]);
             /// CỘNG TIỀN CHO USER
           $userID = User::where('username',$checkCard->username)->first();
           $addMoney = $userID->update([
                'balance' => $userID->balance + ($checkCard->receive_amount * 50 / 100),
                'total_recharge' => $userID->total_recharge + ($checkCard->receive_amount * 50 / 100),
           ]);
          }else{
            $setSuccessCard = $checkCard->update([
                'status' => 'ERROR',
                'note'   => 'Thẻ sai',
            ]);
          }
        }
             return (object)
             [
                 'status' => 'error',
                 'message' => 'Unauthorized'
             ];
    }
}
