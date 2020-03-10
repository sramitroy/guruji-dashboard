<?php
use App\User;
use App\Setting;

/**
* Method Name : setSetting 
* Parameter : $key
* This is using for set setting value 
*/

function setSetting($key,$value)
{
    $setting=Setting::where(array('key'=>$key))->first();
    if ($setting!=NULL) {
        $setting->value = $value;
        $setting->save();
    }else{
        $setting = new Setting;
        $setting->key = $key;
        $setting->value = $value;
        $setting->save();
    }
    return true;
} 

/**
* Method Name : getSetting 
* Parameter : $key
* This is using for return setting value 
*/

function getSetting($key)
{
    if (isset($key) && $key!='') {
        $setting=Setting::where(array('key'=>$key))->first();
        return isset($setting->value)?$setting->value:'';
    }
    return '';
}

?>