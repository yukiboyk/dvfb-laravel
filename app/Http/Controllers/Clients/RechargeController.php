<?php

namespace App\Http\Controllers\Clients;

use App\Models\AutoCard;
use Illuminate\Http\Request;
use App\Http\Requests\CardRechargeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

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
}
