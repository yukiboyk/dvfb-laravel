<?php 

use Carbon\Carbon;
use App\Models\Logs;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;


function webSetting($name_key)
{
    return Settings::getValuebyKey($name_key);
}

function logsCreate($action,$ip,$header)
{
    return Logs::create([
        'username' => Auth::user()->username,
        'ip' => $ip,
        'content' => $action,
        'device' => $header,
    ]);
}

function randStr($length = 10)
{
        $characters = '0123456789ACBDEFGHQ9876543210';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
     }
        return $randomString;
}

function StatusCard($status)
{
    switch ($status) {
        case 'PENDING':
            return '<span class="badge bg-warning">Đang Xử Lý </span>';
            break;
        case 'SUCCESS':
            return '<span class="badge bg-success">Thành Công </span>';
            break;
        case 'ERROR':
            return '<span class="badge bg-danger">Thất Bại </span>';
            break;
        default:
           return "error";
            break;
    }
}

function responseCustom($msg)
    {
        $result = [
            'status' => 'fails',
            'message' => $msg,
        ];
    
        return response()->json($result);
    }
?>