<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\BaseController;
use App\Models\Script;
use Illuminate\Http\Request;

class ScriptController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_pages.settings.script');
    }

    public function getAllScript()
    {
        $get = Script::orderBy('name', 'asc')->paginate(5);
        return json_encode($this->reportSuccess('Script retrived Successfully', $get));
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required',
            'script' => 'required',
        ]);
        $category = new Script();
        $category->name = strtolower($request->name);
        $category->script = $request->script;

        $category->save();

        if ($category) {
            return json_encode($this->reportSuccess('Script added successfully'));
        } else {
            return json_encode($this->reportError('Upload Failed !! Please Try Again'));
        }

    }

    public function destroy($id)
    {
        $category_delete = Script::where('id', $id)->first();
        $category_delete->delete();
        if ($category_delete) {
            return json_encode($this->reportSuccess('Script deleted successfully'));
        } else {
            return json_encode($this->reportError('Failed to delete'));
        }
    }
}