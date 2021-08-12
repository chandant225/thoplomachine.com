<?php

namespace App\Http\Controllers\Backend\Info;

use App\Http\Controllers\BaseController;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Teams;

class TeamsController extends BaseController
{
    public function index()
    {
        return view('admin_pages.infos.our-teams');
    }

    public function getAll(Request $request)
    {
        // dd($request);
        if ($request->sort_by == 'category') {
            $contact = Teams::where('category', 'like', '%' . $request->category . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            if ($request->keywords !== '') {
                $key = $request->keywords;
                $searchBy = $request->search_by;
                $contact = Teams::where($searchBy, 'like', '%' . $key . '%')->orderBy('id', 'desc')->paginate(10);
            } else {
                $contact = Teams::orderBy('id', 'desc')->paginate(10);
            }

        }
        return json_encode($this->reportSuccess('Data retrived successfully', $contact));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validation = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'role' => 'required|string',
            'image' => 'required',
        ]);

        if ($request->hasfile('image')) {
            $i = Storage::disk('public')->put('teams', $request->image[0]);
            
            $store = new Teams();
            $slugify = new Slugify();
            $store->slug = $slugify->slugify($request->name);
            $store->name = $request->name;
            $store->role = $request->role;

            $store->facebook = $request->facebook;
            $store->linkedin = $request->linkedin;
            $store->twitter = $request->twitter;
      
            $store->description = $request->description;
            $store->image = $i;
            $store->save();
            if ($store) {
                return json_encode($this->reportSuccess('Teams added successfully'));

            } else {
                return json_encode($this->reportError('Failed'));

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
    public function updateTeams(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'role' => 'required|string',
        ]);

        $id = $request->id;

        if ($request->hasfile('image')) {
            $i = Storage::disk('public')->put('teams', $request->image[0]);
            Storage::delete('/public/' . $request->prev_image);
        } else {
            $i = $request->prev_image;
        }
        
        $store = Teams::find($id);
        $slugify = new Slugify();

        $store->slug = $slugify->slugify($request->name);

        $store->role = $request->role;

        $store->facebook = $request->facebook;
        $store->linkedin = $request->linkedin;
        $store->twitter = $request->twitter;

        $store->name = $request->name;
        $store->description = $request->description;
        $store->image = $i;

        $store->update();
        if ($store) {
            return json_encode($this->reportSuccess('Teams updated successfully'));

        } else {
            return json_encode($this->reportError('Failed !!'));

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
        $store = Teams::find($id);
        Storage::delete('public/' . $store->image);
        $deleted = $store->delete();
        if ($deleted) {
            return json_encode($this->reportSuccess('Teams deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed !!'));

        }
    }
}