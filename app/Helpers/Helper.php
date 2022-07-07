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

?>