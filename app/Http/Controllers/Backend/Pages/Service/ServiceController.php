<?php

namespace App\Http\Controllers\Backend\Pages\Service;

use App\Http\Controllers\BaseController;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServicePricing;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_pages.service.service');
    }

    public function pricingShow()
    {
        return view('admin_pages.service.pricing');
    }

    public function getAllService(Request $request)
    {
        if ($request->sort_by !== 'all') {
            if ($request->sort_by == 'active') {
                $key = $request->keywords;
                $searchBy = $request->search_by;
                $contact = Service::where($searchBy, 'like', '%' . $key . '%')
                    ->join('service_categories', 'service_categories.id', '=', 'services.cat_id')
                    ->select('services.*', 'service_categories.category')
                    ->where('services.status', '=', 1)
                    ->orderBy('services.id', 'desc')
                    ->paginate(10);
            } else {
                $key = $request->keywords;
                $searchBy = $request->search_by;
                $contact = Service::where($searchBy, 'like', '%' . $key . '%')
                    ->join('service_categories', 'service_categories.id', '=', 'services.cat_id')
                    ->select('services.*', 'service_categories.category')
                    ->where('services.status', '=', 0)
                    ->orderBy('services.id', 'desc')
                    ->paginate(10);
            }

        } else {
            if ($request->keywords !== '') {
                $key = $request->keywords;
                $searchBy = $request->search_by;
                $contact = Service::where($searchBy, 'like', '%' . $key . '%')
                    ->join('service_categories', 'service_categories.id', '=', 'services.cat_id')
                    ->select('services.*', 'service_categories.category')
                    ->orderBy('services.id', 'desc')
                    ->paginate(10);
            } else {
                $contact = Service::join('service_categories', 'service_categories.id', '=', 'services.cat_id')
                    ->select('services.*', 'service_categories.category')
                    ->orderBy('services.id', 'desc')
                    ->paginate(10);
            }

        }

        return json_encode($this->reportSuccess('Data retrived successfully', $contact));
    }

    public function getAllServiceName()
    {
        $travel_category = Service::select('name', 'id')->get();
        return json_encode($this->reportSuccess('Service name retrived Successfully', $travel_category));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validation = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'image' => 'required',
        ]);

        if ($request->hasfile('image')) {
            $i = Storage::disk('public')->put('service', $request->image[0]);
            $store = new Service();
            $slugify = new Slugify();
            $store->slug = $slugify->slugify($request->name);
            $store->name = \strtolower($request->name);
            $store->cat_id = $request->category;

            $store->status = $request->status;
            $store->description = $request->description;
            $store->image = $i;
            $store->save();
            if ($store) {
                return json_encode($this->reportSuccess('Service added successfully'));

            } else {
                return json_encode($this->reportError('Failed'));

            }
        }

    }

    public function updateService(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'prev_image' => 'required|string',
        ]);

        $id = $request->id;

        if ($request->hasfile('image')) {
            $i = Storage::disk('public')->put('service', $request->image[0]);
            Storage::delete('/public/' . $request->prev_image);
        } else {
            $i = $request->prev_image;
        }
        $store = Service::find($id);
        $slugify = new Slugify();
        $store->slug = $slugify->slugify($request->name);

        $store->name = \strtolower($request->name);
        $store->cat_id = $request->category;
        $store->description = $request->description;

        $store->status = $request->status;

        $store->image = $i;

        $store->update();
        if ($store) {
            return json_encode($this->reportSuccess('Service updated successfully'));

        } else {
            return json_encode($this->reportError('Failed !!'));

        }

    }

    public function destroy($id)
    {
        $store = Service::find($id);
        // dd($store);
        Storage::delete('/public/' . $store->image);
        $deleted = $store->delete();
        if ($deleted) {
            return json_encode($this->reportSuccess('Service deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed !!'));
        }
    }

    // for categories----------------------------------------------------------
    public function getCategories()
    {
        $travel_category = ServiceCategory::select('category', 'id')->get();
        return json_encode($this->reportSuccess('Category retrived Successfully', $travel_category));
    }

    public function getAllCategories()
    {
        $travel_category = ServiceCategory::paginate(5);
        return json_encode($this->reportSuccess('Category retrived Successfully', $travel_category));
    }

    public function catStore(Request $request)
    {
        // dd($request->image[0]);
        $this->validate($request, [
            'category' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasfile('image')) {

            $i = Storage::disk('public')->put('service_category', $request->image[0]);

            $category = new ServiceCategory();
            $category->category = strtolower($request->category);
            $category->image = $i;

            $category->save();

            if ($category) {
                return json_encode($this->reportSuccess('Category added successfully'));
            } else {
                return json_encode($this->reportError('Upload Failed !! Please Try Again'));
            }

        }

    }

    public function catDelete($id)
    {
        $category_delete = ServiceCategory::where('id', $id)->first();
        Storage::delete('public/' . $category_delete->image);

        $category_delete->delete();
        if ($category_delete) {
            return json_encode($this->reportSuccess('Category deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed to delete'));
        }
    }

    // for pricing----------------------------------------------------------
    public function getPricing()
    {
        $travel_category = ServicePricing::select('category')->get();
        return json_encode($this->reportSuccess('Category retrived Successfully', $travel_category));
    }

    public function getAllPricing(Request $request)
    {
        // dd($request);
        if ($request->sort_by !== 'all') {
            $get = ServicePricing::where('service_id', $request->sort_by)
                ->join('services', 'services.id', '=', 'service_pricings.service_id')
                ->select('service_pricings.*', 'services.name')
                ->orderBy('service_pricings.id', 'desc')
                ->paginate(10);
        } else {
            if ($request->keywords !== '') {
                $key = $request->keywords;
                $searchBy = $request->search_by;
                $get = ServicePricing::where($searchBy, 'like', '%' . $key . '%')
                    ->join('services', 'services.id', '=', 'service_pricings.service_id')
                    ->select('service_pricings.*', 'services.name')
                    ->orderBy('service_pricings.id', 'desc')
                    ->paginate(10);
            } else {
                $get = ServicePricing::orderBy('id', 'desc')
                    ->join('services', 'services.id', '=', 'service_pricings.service_id')
                    ->select('service_pricings.*', 'services.name')
                    ->orderBy('service_pricings.id', 'desc')
                    ->paginate(10);
            }

        }
        return json_encode($this->reportSuccess('Data retrived successfully', $get));

    }

    public function pricingStore(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'service_id' => 'required',
            'includes' => 'required',
            'price' => 'required',
            'package_type' => 'required',
        ]);
        $category = new ServicePricing();
        $category->service_id = $request->service_id;
        $category->includes = $request->includes;

        $category->offer = $request->offer;
        $category->recommend = $request->recommend === 'false' ? 0 : 1;

        $category->price = $request->price;
        $category->package_type = $request->package_type;

        $category->save();

        if ($category) {
            return json_encode($this->reportSuccess('Pricing added successfully'));
        } else {
            return json_encode($this->reportError('Upload Failed !! Please Try Again'));
        }

    }

    public function pricingUpdate(Request $request)
    {
        $this->validate($request, [
            'service_id' => 'required',
            'includes' => 'required',
            'price' => 'required',
            'package_type' => 'required',
        ]);

        $id = $request->id;

        $category = ServicePricing::find($id);
        $category->service_id = $request->service_id;
        $category->includes = $request->includes;

        $category->offer = $request->offer;
        $category->recommend = $request->recommend === 'false' ? 0 : 1;

        $category->price = $request->price;
        $category->package_type = $request->package_type;

        $category->update();

        if ($category) {
            return json_encode($this->reportSuccess('Pricing updated successfully'));
        } else {
            return json_encode($this->reportError('Update Failed !! Please Try Again'));
        }

    }

    public function pricingDelete($id)
    {
        $category_delete = ServicePricing::where('id', $id)->first();
        $category_delete->delete();
        if ($category_delete) {
            return json_encode($this->reportSuccess('Category deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed to delete'));
        }
    }
}