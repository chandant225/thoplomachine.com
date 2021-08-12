<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\BaseController;
use App\Models\Blog;
use App\Models\BlogCategory;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.blogs.index');
    }

    public function getAllBlogs(Request $request)
    {
        // dd($request);
        // if ($request->sort_by == 'is_seen') {
        //     $contact = Blog::where('is_seen', '=', 1)->orderBy('id', 'desc')->paginate(10);
        // } elseif ($request->sort_by == 'is_not_seen') {
        //     $contact = Blog::where('is_seen', '=', 0)->orderBy('id', 'desc')->paginate(10);
        // } else {
        if ($request->keywords !== '') {
            $key = $request->keywords;
            $searchBy = $request->search_by;
            $contact = Blog::where($searchBy, 'like', '%' . $key . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            $contact = Blog::orderBy('id', 'desc')->paginate(10);
        }

        // }
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
            'title' => 'required|string',
            'category' => 'required|string',
            'written_by' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        if ($request->hasfile('image')) {
            $i = Storage::disk('public')->put('blogs', $request->image[0]);
            $store = new Blog();
            $slugify = new Slugify();
            $store->slug = $slugify->slugify($request->title);
            $store->title = $request->title;

            $store->category = $request->category;
            $store->description = $request->description;
            $store->written_by = $request->written_by;
            $store->image = $i;
            $store->featured = $request->is_featured == true ? '1'  : '0';
            $store->meta_tags = $request->meta_tags;
            $store->meta_description = $request->meta_description;
            $store->meta_title = $request->meta_title;

            $store->save();
            if ($store) {
                return json_encode($this->reportSuccess('Blog added successfully'));

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
    public function updateBlog(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'written_by' => 'required|string',
            'description' => 'required|string',
            'prev_image' => 'required|string',
        ]);

        $id = $request->id;

        if ($request->hasfile('image')) {
            $i = Storage::disk('public')->put('blogs', $request->image[0]);
            Storage::delete('/public/' . $request->prev_image);
        } else {
            $i = $request->prev_image;
        }
        $store = Blog::find($id);
        $slugify = new Slugify();
        $store->slug = $slugify->slugify($request->title);
        $store->title = $request->title;
        $store->category = $request->category;
        $store->description = $request->description;
        $store->written_by = $request->written_by;
        $store->image = $i;

        $store->meta_tags = $request->meta_tags;
        $store->meta_description = $request->meta_description;
        $store->meta_title = $request->meta_title;

        $store->update();
        if ($store) {
            return json_encode($this->reportSuccess('Blog updated successfully'));

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
        $store = Blog::find($id);
        Storage::delete('public/' . $store->image);
        $deleted = $store->delete();
        if ($deleted) {
            return json_encode($this->reportSuccess('Blog deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed !!'));

        }

    }

    // for categories----------------------------------------------------------
    public function getCategories()
    {
        $travel_category = BlogCategory::select('category')->get();
        return json_encode($this->reportSuccess('Category retrived Successfully', $travel_category));
    }

    public function getAllCategories()
    {
        $travel_category = BlogCategory::paginate(5);
        return json_encode($this->reportSuccess('Category retrived Successfully', $travel_category));
    }

    public function catStore(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'category' => 'required',
        ]);

        $category = new BlogCategory();
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
        $category_delete = BlogCategory::where('id', $id)->first();
        $category_delete->delete();
        if ($category_delete) {
            return json_encode($this->reportSuccess('Category deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed to delete'));
        }
    }
}
