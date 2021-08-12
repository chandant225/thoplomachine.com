<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\BaseController;
use App\Models\Asset;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $map = Asset::take(1)->where('type', 'map')->get();
        return view('admin_pages.settings.contact', [
            'map' => $map,
        ]);
    }

    public function getAllContacts(Request $request)
    {
        //dd($request);
        if ($request->sort_by == 'is_seen') {
            $contact = Contact::where('is_seen', '=', 1)->orderBy('id', 'desc')->paginate(10);
        } elseif ($request->sort_by == 'is_not_seen') {
            $contact = Contact::where('is_seen', '=', 0)->orderBy('id', 'desc')->paginate(10);
        } else {
            if ($request->keywords !== '') {
                $key = $request->keywords;
                $searchBy = $request->search_by;
                $contact = Contact::where($searchBy, 'like', '%' . $key . '%')->orderBy('id', 'desc')->paginate(10);
            } else {
                $contact = Contact::orderBy('id', 'desc')->paginate(10);
            }

        }
        return json_encode($this->reportSuccess('Data retrived successfully', $contact));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setSeenContact($id)
    {
        $update = Contact::find($id);
        $update->is_seen = 1;
        $update->update();
        return json_encode($this->reportSuccess('Contact Updated successfully'));
    }

    public function destroy($id)
    {
        $delete = Contact::where('id', $id)->first();
        $delete->delete();
        if ($delete) {
            return json_encode($this->reportSuccess('Contact deleted successfully'));
        } else {
            return json_encode($this->reportError('failed to delete'));
        }

    }

    // for map
    public function uploadMap(Request $request)
    {
        $validate = $request->validate([
            'map' => 'required',
        ]);

        $store = new Asset();
        $store->type = 'map';
        $store->name = $request->map;
        $store->save();
        if ($store) {
            return redirect()->back()->with('success', 'Map Uploaded Successfully !!');
        } else {
            return redirect()->back()->with('error', 'Failed to Upload !!');
        }

    }

    public function updateMap(Request $request)
    {
        $validate = $request->validate([
            'map' => 'required',
            'id' => 'required',
        ]);

        $store = Asset::find($request->id);
        $store->name = $request->map;
        $store->update();
        if ($store) {
            return redirect()->back()->with('success', 'Map Updated Successfully !!');
        } else {
            return redirect()->back()->with('error', 'Failed to Upload !!');
        }

    }
}