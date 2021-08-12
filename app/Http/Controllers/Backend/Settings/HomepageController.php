<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $logo = Asset::where('type', 'logo')->take(1)->get();
        return view('admin_pages.settings.homepage', [
            'sliders' => $sliders,
            'logo' => $logo,
        ]);
    }

    public function getLogo(Request $request)
    {

        $logo = Asset::take(1)->where('type', 'logo')->get();
        return json_encode($logo);

    }

    public function uploadLogo(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required',
        ]);

        $i = Storage::disk('public')->put('logo', $request->image[0]);

        $store = new Asset();
        $store->type = 'logo';
        $store->name = $i;
        $store->save();
        if ($store) {
            return redirect()->back()->with('success', 'Logo Uploaded Successfully !!');
        } else {
            return redirect()->back()->with('error', 'Failed to Upload !!');
        }

    }

    public function updateLogo(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required',
            'id' => 'required',
        ]);

        $i = Storage::disk('public')->put('logo', $request->image[0]);
        Storage::delete('/public/' . $request->prev_image);

        $store = Asset::find($request->id);
        $store->name = $i;
        $store->update();
        if ($store) {
            return redirect()->back()->with('success', 'Logo Updated Successfully !!');
        } else {
            return redirect()->back()->with('error', 'Failed to Upload !!');
        }

    }

}