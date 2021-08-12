<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\BaseController;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends BaseController
{

    public function index()
    {

        return view('admin_pages.settings.newsletter');
    }

    public function getAllNewsletter(Request $request)
    {

        $contact = Newsletter::orderBy('id', 'desc')->paginate(10);

        return json_encode($this->reportSuccess('Data retrived successfully', $contact));
    }

    public function destroy($id)
    {
        $delete = Newsletter::where('id', $id)->first();
        $delete->delete();
        if ($delete) {
            return json_encode($this->reportSuccess('Newsletter deleted successfully'));
        } else {
            return json_encode($this->reportError('failed to delete'));
        }

    }
}