<?php

namespace App\Http\Controllers\Backend\pages;

use App\Http\Controllers\BaseController;
use App\Models\Faq;
use App\Models\FaqCategory;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_pages.settings.faq');
    }

    public function getAllFaq(Request $request)
    {
        // dd($request);
        if ($request->sort_by == 'all') {
            $key = $request->keywords;
            $searchBy = $request->search_by;
            $get = Faq::orderBy('faqs.id', 'desc')
                ->join('faq_categories', 'faq_categories.id', '=', 'faqs.cat_id')
                ->select('faq_categories.category', 'faqs.*')
                ->where($searchBy, 'like', '%' . $key . '%')
                ->paginate(10);
        } else {
            $get = Faq::orderBy('faqs.id', 'desc')
                ->where('faqs.cat_id', $request->sort_by)
                ->join('faq_categories', 'faq_categories.id', '=', 'faqs.cat_id')
                ->select('faq_categories.category', 'faqs.*')
                ->paginate(10);

        }
        return json_encode($this->reportSuccess('Data retrived successfully', $get));
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
            'title' => 'required|string',
            'category' => 'required',
            'description' => 'required|string',
        ]);

        $store = new Faq();
        $slugify = new Slugify();
        $store->slug = $slugify->slugify($request->title);
        $store->title = $request->title;
        $store->cat_id = $request->category;
        $store->description = $request->description;
        $store->save();
        if ($store) {
            return json_encode($this->reportSuccess('Faq added successfully'));

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
    public function updateFaq(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        $id = $request->id;

        $store = Faq::find($id);
        $slugify = new Slugify();
        $store->slug = $slugify->slugify($request->title);
        $store->title = $request->title;
        $store->cat_id = $request->category;
        $store->description = $request->description;
        $store->update();
        if ($store) {
            return json_encode($this->reportSuccess('Faq updated successfully'));

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

        $store = Faq::find($id);

        $deleted = $store->delete();
        if ($deleted) {
            return json_encode($this->reportSuccess('Faq deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed !!'));

        }
    }

    // for categories----------------------------------------------------------
    public function getCategories()
    {
        $travel_category = FaqCategory::select('category', 'id')->get();
        return json_encode($this->reportSuccess('Category retrived Successfully', $travel_category));
    }

    public function getAllCategories()
    {
        $travel_category = FaqCategory::paginate(5);
        return json_encode($this->reportSuccess('Category retrived Successfully', $travel_category));
    }

    public function catStore(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'category' => 'required',
        ]);

        $category = new FaqCategory();
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
        $category_delete = FaqCategory::where('id', $id)->first();
        $category_delete->delete();
        if ($category_delete) {
            return json_encode($this->reportSuccess('Category deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed to delete'));
        }
    }
}