<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\BaseController;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends BaseController
{

    public function index()
    {
        $subscribers = Newsletter::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.subscriber', compact('subscribers'));
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
