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
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Script;
use App\Models\Service;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Share;

class FrontendController extends BaseController
{
    public function indexPage()
    {
        // dd(URL::current());
        $portfolio = Portfolio::orderBy('id', 'desc')->take(4)->get();
        // all
        $script = Script::all();

        $clients = Portfolio::orderBy('updated_at','DESC')->get();
        $blogs = Blog::where('featured', 1)->orderBy('id', 'desc')->take(4)->get();
        $services = Service::where('status', 1)->orderBy('id', 'desc')->take(4)->get();
        $faqs = Faq::orderBy('id', 'desc')->take(4)->get();
        $pages = Page::orderBy('id', 'desc')->take(6)->get();
       

        return view('frontend.index', [
            'portfolio' => $portfolio,
            'script' => $script,
            'clients' => $clients,
            'blogs' => $blogs,
            'services' => $services,
            'faqs' => $faqs,
            'pages' => $pages,
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

    public function portfolios()
    {
        $portfolios = Portfolio::orderBy('id', 'desc')->get();
        return view('frontend.pages.portfolio',compact('portfolios'));

    }

    // portfolio details page--------------------------------------
    public function portfolioPage()
    {
        $script = Script::all();

        return view('frontend_pages.portfolio');
    }

    // thankyou page--------------------------------------
    public function thankyou()
    {
        return view('frontend.pages.thank-you');
    }

    // blog-------------------------------------------
    public function Blog()
    {
        // $category = Blog::with('category')->paginate(1);
        // $faq = (new Faq)->getCategory('blog');
        // $script = Script::all();

        $blogs = Blog::orderBy('id', 'desc')->paginate(12);
        return view('frontend.pages.blog.index', [
            // 'category' => $category,
            'blogs' => $blogs,
            // 'faq' => $faq,
            // 'script' => $script,

        ]);
    }

    // blog-------------------------------------------
    public function blogCategory($cat)
    {
        $blogs = Blog::where('category', $cat)->orderBy('id', 'desc')->paginate(10);

        return view('frontend.pages.blog.category', [
            'blogs' => $blogs,
        ]);
    }


    // blog details page --------------------------------
    public function blogDetail($slug)
    {

        $b = Blog::where('slug',"=", $slug)->where('featured',"=", 1)->first();

        $fullurl = URL::to('/').'/blog/'.$b->slug;

        $category = BlogCategory::take(5)->get();
        $recents_blogs = Blog::where('slug', '!=', $slug)->where('featured',"=", 1)->orderBy('id', 'desc')->take(4)->get();

        return view('frontend.pages.blog.blog-details', [
            'blog' => $b,
            // 'related' => $related,
            'recents' => $recents_blogs,
            'categories' => $category,
        ]);


        // $b = Blog::where('slug', $slug)->take(1)->get();
        // $blog = $b[0];

        // $related = Blog::where('category', $blog->category)->take(3)->get();

        // $next = Blog::where('category', $blog->category)->paginate(3);
        // $script = Script::all();


        // $b = Blog::where('slug', $slug)->take(1)->get();
        // $related = Blog::where('category_id', $b[0]->category_id)->take(4)->get();
        // $recent = Blog::take(6)->orderBy('id', 'desc')->whereNotIN('slug', [$b[0]->slug])->get();

        // $blog = $b[0];

        // return view('frontend_pages.blog.blog-detail', [
        //     'blog' => $blog,
        //     'related' => $related,
        //     'next' => $next,
        //     'script' => $script,

        // ]);
    }

    // contact page
    public function contactPage()
    {
        return view('frontend.pages.contact');
    }

    // Our Teams page
    public function ourTeam()
    {
        $teams = Teams::all();
        $script = Script::all();

        return view('frontend.pages.our-teams', [
            'teams' => $teams,
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

        // $this->sendContactEmail($store);

        if ($store) {
            return redirect('/thank-you');

        } else {
            return response()->with(['error' => 'Failed. Please try again.']);
        }

    }

    protected function sendContactEmail($store)
    {
        dispatch(new SendContactMail($store));
    }


    public function aboutus()
    {
        $service  = Service::all();
        return view('frontend.pages.about', compact('service'));
    }

    public function services()
    {
        $services = Service::where('status', 1)->get();
        return view('frontend.pages.service.index', compact('services'));
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('slug', $slug)->where('status', 1)->first();
        $others_services = Service::where('slug', '!=', $slug)->where('status', 1)->take(4)->get();

        return view('frontend.pages.service.details', compact('service', 'others_services'));
    }

    public function products()
    {
        return view('frontend.pages.product.index');
    }

    public function productDetails()
    {
        return view('frontend.pages.product.details');
    }


    public function page_details($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('frontend.pages.page_details', compact('page'));
    }
}
