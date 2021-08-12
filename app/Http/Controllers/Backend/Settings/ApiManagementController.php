<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\BaseController;
use App\Models\Api;
use Illuminate\Http\Request;

class ApiManagementController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_pages.settings.api-management');
    }

    public function getAllApi()
    {
        $get = Api::orderBy('name', 'asc')->paginate(5);
        return json_encode($this->reportSuccess('API retrived Successfully', $get));
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'token' => 'required',
        ]);
        $category = new Api();
        $category->name = strtolower($request->name);
        $category->type = $request->type;
        $category->token = $request->token;

        $category->save();

        if ($category) {
            return json_encode($this->reportSuccess('API added successfully'));
        } else {
            return json_encode($this->reportError('Upload Failed !! Please Try Again'));
        }

    }

    public function destroy($id)
    {
        $category_delete = Api::where('id', $id)->first();
        $category_delete->delete();
        if ($category_delete) {
            return json_encode($this->reportSuccess('API deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed to delete'));
        }
    }

}