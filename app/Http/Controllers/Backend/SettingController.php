<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.settings.application');
    }

    //global settings to create and update the settings with single image

    public function update(Request $request)
    {
        // return $request;


        foreach ($request->types as $key => $type) {


            if ($type == 'site_name') {
                $this->overWriteEnvFile('APP_NAME', $request[$type]);
            }

            if ($type == 'timezone') {
                $this->overWriteEnvFile('APP_TIMEZONE', $request[$type]);
            } else {
                // if image
                if ($request->hasFile($type)) {

                    $image = Setting::where('type', $type)->first();
                    // dd($image)
                    if($image) {
                        $image->value ? Storage::delete($image->value) : '';
                    }

                    $file = $request->file($type);
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $full_file_path = $request->file($type)->storeAs('images', $file_name, 'public');
                    $value = $full_file_path;


                    //if array
                } elseif (gettype($request[$type]) == 'array') {
                    $value  = json_encode($request[$type]);
                } else {
                    $value = request($type);
                }

                if($request->has($type)){
                    set_setting($type, $value);
                }
            }
        }
        return back();
    }


    public function homeSection()
    {
        return  view('admin.pages.settings.websitesetting');
    }
}
