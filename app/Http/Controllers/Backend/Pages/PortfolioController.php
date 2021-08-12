<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\BaseController;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.portfolio');
    }

    public function getAllPortfolio(Request $request)
    {
        // dd($request);
        if ($request->sort_by == 'category') {
            $contact = Portfolio::where('category', 'like', '%' . $request->category . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            if ($request->keywords !== '') {
                $key = $request->keywords;
                $searchBy = $request->search_by;
                $contact = Portfolio::where($searchBy, 'like', '%' . $key . '%')->orderBy('id', 'desc')->paginate(10);
            } else {
                $contact = Portfolio::orderBy('id', 'desc')->paginate(10);
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
            'category' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|string',
            'client' => 'required|string',
            'technology' => 'required|string',
            'image' => 'required',
        ]);

        if ($request->hasfile('image')) {
            $i = Storage::disk('public')->put('portfolio', $request->image[0]);
            $store = new Portfolio();
            $slugify = new Slugify();
            $store->slug = $slugify->slugify($request->name);
            $store->name = $request->name;

            $store->category = $request->category;
            $store->video = $request->video;

            $store->description = $request->description;
            $store->link = $request->link;
            $store->client = $request->client;
            $store->technology = $request->technology;
            $store->image = $i;
            $store->save();
            if ($store) {
                return json_encode($this->reportSuccess('Portfolio added successfully'));

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
    public function updatePortfolio(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|string',
            'client' => 'required|string',
            'technology' => 'required|string',
            'prev_image' => 'required|string',
        ]);

        $id = $request->id;

        if ($request->hasfile('image')) {
            $i = Storage::disk('public')->put('portfolio', $request->image[0]);
            Storage::delete('/public/' . $request->prev_image);
        } else {
            $i = $request->prev_image;
        }
        $store = Portfolio::find($id);
        $slugify = new Slugify();
        $store->slug = $slugify->slugify($request->name);
        $store->name = $request->name;

        $store->category = $request->category;
        $store->video = $request->video;

        $store->description = $request->description;
        $store->link = $request->link;
        $store->client = $request->client;
        $store->technology = $request->technology;
        $store->image = $i;

        $store->update();
        if ($store) {
            return json_encode($this->reportSuccess('Portfolio updated successfully'));

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
        $store = Portfolio::find($id);
        Storage::delete('public/' . $store->image);
        $deleted = $store->delete();
        if ($deleted) {
            return json_encode($this->reportSuccess('Portfolio deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed !!'));

        }
    }

    // for categories----------------------------------------------------------
    public function getCategories()
    {
        $travel_category = PortfolioCategory::select('category')->get();
        return json_encode($this->reportSuccess('Category retrived Successfully', $travel_category));
    }

    public function getAllCategories()
    {
        $travel_category = PortfolioCategory::paginate(5);
        return json_encode($this->reportSuccess('Category retrived Successfully', $travel_category));
    }

    public function catStore(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'category' => 'required',
        ]);

        $category = new PortfolioCategory();
        $category->category = strtolower($request->category);
        $category->save();

        if ($category) {
            return json_encode($this->reportSuccess('Category added successfully'));
        } else {
            return json_encode($this->reportError('Upload Failed !! Please Try Again'));
        }

    }

    public function catDelete($id)
    {
        $category_delete = PortfolioCategory::where('id', $id)->first();
        $category_delete->delete();
        if ($category_delete) {
            return json_encode($this->reportSuccess('Category deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed to delete'));
        }
    }

}
