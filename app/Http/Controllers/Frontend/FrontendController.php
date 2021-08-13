<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use App\Jobs\SendContactMail;
use App\Models\Asset;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Newsletter;
use App\Models\Portfolio;
use App\Models\Script;
use App\Models\Teams;
use Illuminate\Http\Request;

class FrontendController extends BaseController
{
    public function indexPage()
    {
        // dd(URL::current());
        $portfolio = Portfolio::orderBy('id', 'desc')->take(4)->get();
        // all
        $faq = (new Faq)->getCategory('home');
        $script = Script::all();
        return view('frontend.index', [
            'portfolio' => $portfolio,
            'faq' => $faq,
            'script' => $script,
        ]);
    }

    public function siteMap()
    {
        return response()->view('frontend_pages.sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function search($key)
    {
        $blog = [];

        if ($key) {
            $blog = Blog::where('title', 'LIKE', '%' . $key . "%")->get();
        }

        return json_encode($this->reportSuccess('Data retrived successfully', $blog));
    }

    public function getAllPortfolio(Request $request)
    {
        // dd($request);
        if ($request->category == 'all') {
            $contact = Portfolio::orderBy('id', 'desc')->take(6)->get();
        } else {
            $contact = Portfolio::where('category', 'LIKE', '%' . $request->category . "%")->orderBy('id', 'desc')->take(6)->get();
        }

        return json_encode($this->reportSuccess('Data retrived successfully', $contact));
    }

    // portfolio details page--------------------------------------
    public function portfolioPage()
    {
        $faq = (new Faq)->getCategory('portfolio');
        $script = Script::all();

        return view('frontend_pages.portfolio', [
            'faq' => $faq,

        ]);
    }

    // thankyou page--------------------------------------
    public function thankyou()
    {
        return view('frontend_pages.thankyou');
    }

    // blog-------------------------------------------
    public function Blog()
    {
        $category = BlogCategory::all();
        $faq = (new Faq)->getCategory('blog');
        $script = Script::all();

        $blogs = Blog::orderBy('id', 'desc')->paginate(1);
        return view('frontend_pages.blog.blog', [
            'category' => $category,
            'blogs' => $blogs,
            'faq' => $faq,
            'script' => $script,

        ]);
    }

    // blog-------------------------------------------
    public function blogCategory($cat)
    {
        $category = BlogCategory::all();
        $faq = (new Faq)->getCategory('blog');
        $script = Script::all();

        $blogs = Blog::where('category', $cat)->orderBy('id', 'desc')->paginate(1);
        return view('frontend_pages.blog.category', [
            'blogs' => $blogs,
            'cat' => $cat,
            'category' => $category,
            'faq' => $faq,
            'script' => $script,
        ]);
    }

    // blog details page --------------------------------
    public function blogDetail($slug)
    {
        $b = Blog::where('slug', $slug)->take(1)->get();
        $blog = $b[0];

        $related = Blog::where('category', $blog->category)->take(3)->get();

        $next = Blog::where('category', $blog->category)->paginate(3);
        $script = Script::all();


        // $b = Blog::where('slug', $slug)->take(1)->get();
        // $related = Blog::where('category_id', $b[0]->category_id)->take(4)->get();
        // $recent = Blog::take(6)->orderBy('id', 'desc')->whereNotIN('slug', [$b[0]->slug])->get();

        // $blog = $b[0];

        return view('frontend_pages.blog.blog-detail', [
            'blog' => $blog,
            'related' => $related,
            'next' => $next,
            'script' => $script,

        ]);
    }

    // contact page
    public function contactPage()
    {
        $map = Asset::where('type', 'map')->first();
        $faq = (new Faq)->getCategory('contact');
        $script = Script::all();

        return view('frontend_pages.contact', [
            'map' => $map,
            'faq' => $faq,
            'script' => $script,

        ]);
    }

    // contact page
    public function aboutPage()
    {
        $faq = (new Faq)->getCategory('about');
        $teams = Teams::all();
        $script = Script::all();

        return view('frontend_pages.about', [
            'teams' => $teams,
            'faq' => $faq,
            'script' => $script,
        ]);
    }

    // saving contact details --------------------------
    public function saveNewsletter($email)
    {
        $store = new Newsletter();
        $store->email = $email;
        $store->save();
        if ($store) {
            return json_encode($this->reportSuccess('Thank you for subscribing.'));

        } else {
            return json_encode($this->reportError('Failed. Please try again.'));
        }

    }

    // saving contact details --------------------------
    public function saveContact(Request $request)
    {

        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        $store = new Contact();
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->message = $request->message;
        $store->save();

        $this->sendContactEmail($store);

        if ($store) {
            return json_encode($this->reportSuccess('Message sent Successfully. Our team will contact you soon.'));

        } else {
            return json_encode($this->reportError('Message send failed. Please try again'));
        }

    }

    protected function sendContactEmail($store)
    {
        dispatch(new SendContactMail($store));
    }
}
