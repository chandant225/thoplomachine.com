<?php

namespace App\Http\Controllers\Backend\Pages\Service;

use App\Http\Controllers\BaseController;
use App\Models\PackageOrder;
use Illuminate\Http\Request;

class ServiceOrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_pages.service.orders');
    }

    public function getAllOrders(Request $request)
    {
        // dd($request);
        if ($request->sort_by != 'all') {
            // $get = PackageOrder::where('category', 'like', '%' . $request->category . '%')
            //     ->join('service_pricings', 'service_pricings.id', '=', 'package_orders.pricing_id')
            //     ->orderBy('id', 'desc')->paginate(10);
        } else {
            if ($request->keywords !== null) {
                $key = $request->keywords;
                $searchBy = $request->search_by;
                $get = PackageOrder::where($searchBy, 'like', '%' . $key . '%')
                    ->join('service_pricings', 'service_pricings.id', '=', 'package_orders.pricing_id')
                    ->select('package_orders.*', 'service_pricings.package_type', 'service_pricings.includes', 'service_pricings.price', 'service_pricings.service_id')
                    ->orderBy('package_orders.id', 'desc')
                    ->paginate(10);

            } else {
                $get = PackageOrder::join('service_pricings', 'package_orders.pricing_id', '=', 'service_pricings.id')
                    ->select('package_orders.*', 'service_pricings.package_type', 'service_pricings.includes', 'service_pricings.price', 'service_pricings.service_id')
                    ->orderBy('package_orders.id', 'desc')
                    ->paginate(10);
                // dd($request->keywords);

            }

        }
        return json_encode($this->reportSuccess('Data retrived successfully', $get));
    }

}