<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cocur\Slugify\Slugify;
use App\Models\Page;
use App\Http\Controllers\BaseController;


class PagesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.page');
    }

    public function getAll(Request $request)
    {
            $pages = Page::orderBy('id', 'desc')->paginate(10);

        return json_encode($this->reportSuccess('Data retrived successfully', $pages));
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
            'title' => 'required|string',
            'content' => 'required|string',
            'type' => 'required|string',
        ]);



            $store = new Page();
            $slugify = new Slugify();
            $store->slug = $slugify->slugify($request->title);

            $store->type = $request->type;
            $store->title = $request->title;
            $store->content = $request->content;
            $store->meta_title = $request->meta_title;
            $store->meta_description = $request->meta_description;
            $store->meta_keywords = $request->meta_keywords;
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
    public function updatePage(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'type' => 'required|string',
        ]);

        $id = $request->id;

        $store = Page::find($id);
        $slugify = new Slugify();
        $store->slug = $slugify->slugify($request->title);

        $store->type = $request->type;
        $store->title = $request->title;
        $store->content = $request->content;
        $store->meta_title = $request->meta_title;
        $store->meta_description = $request->meta_description;
        $store->meta_keywords = $request->meta_keywords;
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
        $delete = Page::find($id);
        $delete->delete();
        if ($delete) {
            return json_encode($this->reportSuccess('Page deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed !!'));

        }
    }
}
