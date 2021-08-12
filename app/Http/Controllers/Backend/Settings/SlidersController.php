<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ]);
        // dd($request->all());

        if ($request->hasfile('image')) {

            $i = Storage::disk('public')->put('sliders', $request->image[0]);
            $store = new Slider();
            $store->title = $request->title;
            $store->link = $request->link;
            $store->description = $request->description;
            $store->image = $i;
            $store->save();
            if ($store) {
                return redirect()->back()->with('success', 'Slider Uploaded Successfully !!');
            } else {
                return redirect()->back()->with('error', 'Failed to Upload !!');
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'description' => 'required|string',
            'prev_image' => 'required|string',
        ]);
        // dd($request->all());

        if ($request->hasfile('image')) {
            $i = Storage::disk('public')->put('sliders', $request->image[0]);
            Storage::delete('/public/' . $request->prev_image);
        } else {
            $i = $request->prev_image;
        }
        $store = Slider::find($id);
        $store->title = $request->title;
        $store->link = $request->link;
        $store->description = $request->description;
        $store->image = $i;
        $store->update();
        if ($store) {
            return redirect()->back()->with('success', 'Slider Updated Successfully !!');
        } else {
            return redirect()->back()->with('error', 'Failed to Update !!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}