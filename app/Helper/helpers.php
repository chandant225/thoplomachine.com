<?php


use Illuminate\Support\Str;
use App\Models\Setting;

function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}


function get_setting($type, $default =  null)
{
    $setting = Setting::where('type', $type)->first();
    return $setting == null ? $default : $setting->value;
}
