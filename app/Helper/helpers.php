<?php

use App\Models\Service;
use Illuminate\Support\Str;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}

if(!function_exists('set_setting')){

    function set_setting($type, $value, $default = null)
    {
        Setting::clearCache();

        return Setting::updateOrCreate(
            ['type' => $type],
            ['value' => $value]
        );
    }
}


function get_setting($type, $default =  null)
{
    Cache::remember('app_settings', now()->addHours(6), function () {
        return Setting::all();
    });

    $setting = Cache::get('app_settings', collect([]))->where('type', $type)->first();

    return $setting !=null ? $setting->value : $default;
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

if (! function_exists('load_all_setting')) {

    function load_all_setting()
    {
        dd('loading all settings.');
        return Setting::get();
    }
}
