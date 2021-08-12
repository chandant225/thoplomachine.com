<?php

namespace App\Http\Controllers\Backend\Info;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Cocur\Slugify\Slugify;
use App\Models\Info;

class InfoController extends BaseController
{
    public function index(){
        return view('admin_pages.infos.infos');
    }

    public function getAll(Request $request)
    {
        // dd($request);
        if ($request->sort_by == 'category') {
            $contact = Info::where('category', 'like', '%' . $request->category . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            if ($request->keywords !== '') {
                $key = $request->keywords;
                $searchBy = $request->search_by;
                $contact = Info::where($searchBy, 'like', '%' . $key . '%')->orderBy('id', 'desc')->paginate(10);
            } else {
                $contact = Info::orderBy('id', 'desc')->paginate(10);
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
        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        
            
            $store = new Info();
            $slugify = new Slugify();
            $store->slug = $slugify->slugify($request->name);
            
            $store->page_name = $request->name;       
            $store->description = $request->description;
            $store->save();
            if ($store) {
                return json_encode($this->reportSuccess('Page added successfully'));

            } else {
                return json_encode($this->reportError('Failed'));

            }
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $id = $request->id;

        $store = Info::find($id);
        $slugify = new Slugify();
        $store->slug = $slugify->slugify($request->name);
        
        $store->page_name = $request->name;       
        $store->description = $request->description;

        $store->update();
        if ($store) {
            return json_encode($this->reportSuccess('Page updated successfully'));

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
        $delete = Info::find($id);
        $delete->delete();
        if ($delete) {
            return json_encode($this->reportSuccess('Info deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed !!'));

        }
    }
}