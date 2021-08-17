<?php

use App\Models\Service;
use Illuminate\Support\Str;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;

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

function get_storage_location()
{
    return URL::asset('storage');
}

function formated_date($date)
{
    return \Carbon\Carbon::parse($date)->toFormattedDateString();
}


function footer_services($items = 4) {
    $service= Service::orderBy('id', 'desc')->take($items)->get();
    return $service;
}
