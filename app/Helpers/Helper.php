<?php 

use Carbon\Carbon;
use App\Models\Settings;


function webSetting($name_key)
{
    return Settings::getValuebyKey($name_key);
}

?>