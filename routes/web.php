<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    // 'verify' => false, // Email Verification Routes...
]);

// logo
Route::get('/sitemap.xml', [App\Http\Controllers\Frontend\FrontendController::class, 'siteMap']);
Route::get('/get-logo', [App\Http\Controllers\Backend\Settings\HomepageController::class, 'getLogo']);

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'indexPage']);
// contact
Route::get('/search/{keyword}', [App\Http\Controllers\Frontend\FrontendController::class, 'search']);
Route::get('/contact-us', [App\Http\Controllers\Frontend\FrontendController::class, 'contactPage']);

Route::post('/save-contact', [App\Http\Controllers\Frontend\FrontendController::class, 'saveContact']);
Route::get('/save-newsletter/{email}', [App\Http\Controllers\Frontend\FrontendController::class, 'saveNewsletter']);
Route::get('/about-us', [App\Http\Controllers\Frontend\FrontendController::class, 'aboutus']);

// portfolio
Route::get('/portfolio', [App\Http\Controllers\Frontend\FrontendController::class, 'portfolioPage']);
Route::get('/our-clients', [App\Http\Controllers\Frontend\FrontendController::class, 'portfolios']);
Route::get('/category/portfolio/get', [App\Http\Controllers\Backend\Pages\PortfolioController::class, 'getCategories']);
// service
Route::get('/service/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'serviceDetail']);
// our teams
Route::get('/our-team', [App\Http\Controllers\Frontend\FrontendController::class, 'ourTeam']);
Route::get('/thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

// blog
Route::get('/blogs', [App\Http\Controllers\Frontend\FrontendController::class, 'Blog']);
Route::get('/searchby/{category}', [App\Http\Controllers\Frontend\FrontendController::class, 'blogCategory']);
Route::get('/blog/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'blogDetail']);

//services
Route::get('services', [App\Http\Controllers\Frontend\FrontendController::class, 'services']);
Route::get('service/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'serviceDetails']);

//producsts
Route::get('products', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('product/shop', [App\Http\Controllers\Frontend\FrontendController::class, 'productDetails']);

// admin comtrollers--------------------------------------------------------------------------------------------------------

// middleware auth group
Route::group(['middleware' => ['auth'], 'prefix' =>'admin'], function () {


    // dashboard
    Route::get('/', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('admin');

    Route::get('homepage', [App\Http\Controllers\Backend\Settings\HomepageController::class, 'index']);

    // scripts
    Route::resource('script', App\Http\Controllers\Backend\Settings\ScriptController::class)->only(['index', 'update', 'destroy', 'store']);
    Route::get('script/get-all', [App\Http\Controllers\Backend\Settings\ScriptController::class, 'getAllScript']);

    // infos - policies - terms and condition aboutus
    Route::resource('infos', App\Http\Controllers\Backend\Info\InfoController::class)->only(['index', 'destroy', 'store']);
    Route::post('infos/update', [App\Http\Controllers\Backend\Info\InfoController::class, 'updateInfo']);
    Route::post('get-all-infos', [App\Http\Controllers\Backend\Info\InfoController::class, 'getAll']);

    // our teams
    Route::resource('teams', App\Http\Controllers\Backend\Info\TeamsController::class)->only(['index', 'destroy', 'store']);
    Route::post('teams/update', [App\Http\Controllers\Backend\Info\TeamsController::class, 'updateTeams']);
    Route::post('get-all-teams', [App\Http\Controllers\Backend\Info\TeamsController::class, 'getAll']);

    // logo
    Route::post('logo', [App\Http\Controllers\Backend\Settings\HomepageController::class, 'uploadLogo']);
    Route::post('logo/update', [App\Http\Controllers\Backend\Settings\HomepageController::class, 'updateLogo']);
    // map
    Route::post('map', [App\Http\Controllers\Backend\Settings\ContactController::class, 'uploadMap']);
    Route::post('map/update', [App\Http\Controllers\Backend\Settings\ContactController::class, 'updateMap']);

    //sliders-------------------------------------------------------------------------------------------
    Route::resource('sliders', App\Http\Controllers\Backend\Settings\SlidersController::class)->only(['update', 'destroy', 'store']);

    // analytics
    Route::get('analytics', [App\Http\Controllers\Backend\Settings\AnalyticsController::class, 'index']);
    Route::get('analytics/page-views/{days}', [App\Http\Controllers\Backend\Settings\AnalyticsController::class, 'getPageViewsByDate']);
    Route::get('analytics/user-types', [App\Http\Controllers\Backend\Settings\AnalyticsController::class, 'getUserTypes']);
    Route::get('analytics/top-browsers', [App\Http\Controllers\Backend\Settings\AnalyticsController::class, 'getTopBrowsers']);
    Route::get('analytics/most-visited-pages', [App\Http\Controllers\Backend\Settings\AnalyticsController::class, 'getMostVisitedPages']);
    Route::get('analytics/top-reffers', [App\Http\Controllers\Backend\Settings\AnalyticsController::class, 'getTopReffers']);

    // contacts---------------------------------------------------------------------------------------------
    Route::resource('contact', App\Http\Controllers\Backend\Settings\ContactController::class)->only(['index', 'update', 'destroy']);
    Route::post('get-all-contacts', [App\Http\Controllers\Backend\Settings\ContactController::class, 'getAllContacts']);
    Route::get('set-seen/contact/{id}', [App\Http\Controllers\Backend\Settings\ContactController::class, 'setSeenContact']);

    // newsletter---------------------------------------------------------------------------------------------
    Route::resource('subscriber', App\Http\Controllers\Backend\Settings\NewsletterController::class)->only(['index', 'update', 'destroy']);
    Route::post('get-all-newsletter', [App\Http\Controllers\Backend\Settings\NewsletterController::class, 'getAllNewsletter']);

    // blogs----------------------------------------------------------------------------------------------
    Route::resource('blogs', App\Http\Controllers\Backend\Pages\BlogController::class)->only(['index', 'store', 'destroy']);
    Route::post('get-all-blogs', [App\Http\Controllers\Backend\Pages\BlogController::class, 'getAllBlogs']);
    Route::post('blogs/update', [App\Http\Controllers\Backend\Pages\BlogController::class, 'updateBlog']);

    Route::post('category/blog/store', [App\Http\Controllers\Backend\Pages\BlogController::class, 'catStore']);
    Route::delete('category/blog/delete/{id}', [App\Http\Controllers\Backend\Pages\BlogController::class, 'catDelete']);
    Route::get('category/blog/get-all', [App\Http\Controllers\Backend\Pages\BlogController::class, 'getAllCategories']);
    Route::get('category/blog/get', [App\Http\Controllers\Backend\Pages\BlogController::class, 'getCategories']);

    // portfolio----------------------------------------------------------------------------------------------
    Route::resource('portfolio', App\Http\Controllers\Backend\Pages\PortfolioController::class)->only(['index', 'store', 'destroy']);
    Route::post('get-all-portfolio', [App\Http\Controllers\Backend\Pages\PortfolioController::class, 'getAllPortfolio']);
    Route::post('portfolio/update', [App\Http\Controllers\Backend\Pages\PortfolioController::class, 'updatePortfolio']);

    Route::post('category/portfolio/store', [App\Http\Controllers\Backend\Pages\PortfolioController::class, 'catStore']);
    Route::delete('category/portfolio/delete/{id}', [App\Http\Controllers\Backend\Pages\PortfolioController::class, 'catDelete']);
    Route::get('category/portfolio/get-all', [App\Http\Controllers\Backend\Pages\PortfolioController::class, 'getAllCategories']);
    Route::get('category/portfolio/get', [App\Http\Controllers\Backend\Pages\PortfolioController::class, 'getCategories']);

    // faq----------------------------------------------------------------------------------------------
    Route::resource('faq', App\Http\Controllers\Backend\Pages\FaqController::class)->only(['index', 'store', 'destroy']);
    Route::post('get-all-faq', [App\Http\Controllers\Backend\Pages\FaqController::class, 'getAllFaq']);
    Route::post('faq/update', [App\Http\Controllers\Backend\Pages\FaqController::class, 'updateFaq']);

    Route::post('category/faq/store', [App\Http\Controllers\Backend\Pages\FaqController::class, 'catStore']);
    Route::delete('category/faq/delete/{id}', [App\Http\Controllers\Backend\Pages\FaqController::class, 'catDelete']);
    Route::get('category/faq/get-all', [App\Http\Controllers\Backend\Pages\FaqController::class, 'getAllCategories']);
    Route::get('category/faq/get', [App\Http\Controllers\Backend\Pages\FaqController::class, 'getCategories']);

    // services-----------------------------------------------------------------------------------------
    Route::resource('service', App\Http\Controllers\Backend\Pages\Service\ServiceController::class)->only(['index', 'store', 'destroy']);
    Route::post('get-all-service', [App\Http\Controllers\Backend\Pages\Service\ServiceController::class, 'getAllService']);
    Route::get('get-all-service-name', [App\Http\Controllers\Backend\Pages\Service\ServiceController::class, 'getAllServiceName']);
    Route::post('service/update', [App\Http\Controllers\Backend\Pages\Service\ServiceController::class, 'updateService']);

    //Pages ---------------------------------------------------------------------------------

     Route::resource('pages', App\Http\Controllers\Backend\PagesController::class)->only(['index', 'store', 'destroy']);
     Route::post('pages/update', [App\Http\Controllers\Backend\PagesController::class, 'updatePage']);
     Route::post('get-all-pages', [App\Http\Controllers\Backend\PagesController::class, 'getAll']);

    // services category
    Route::post('category/service/store', [App\Http\Controllers\Backend\Pages\Service\ServiceController::class, 'catStore']);
    Route::delete('category/service/delete/{id}', [App\Http\Controllers\Backend\Pages\Service\ServiceController::class, 'catDelete']);
    Route::get('category/service/get-all', [App\Http\Controllers\Backend\Pages\Service\ServiceController::class, 'getAllCategories']);
    Route::get('category/service/get', [App\Http\Controllers\Backend\Pages\Service\ServiceController::class, 'getCategories']);

    // api management----------------------------------------------------------------
    Route::resource('api-management', App\Http\Controllers\Backend\Settings\ApiManagementController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::get('api-management/get-all', [App\Http\Controllers\Backend\Settings\ApiManagementController::class, 'getAllApi']);


     //category---------------------------------------------------------------------------------------------
     Route::get('/categories', function(){
        return view('admin.pages.category');
    })->name('categories.index');

    //portfolio categories
    Route::get('/portfolio/category', function(){
        return view('admin.pages.portfolio-category');
    })->name('portfolio.categories.index');

    //settings routes
    Route::get('/application-settings', [App\Http\Controllers\Backend\SettingController::class, 'index'])->name('admin.app.setting');
    Route::post('application-settings/save', [App\Http\Controllers\Backend\SettingController::class, 'update'])->name('app.setting.save');

    Route::get('/home-section', [App\Http\Controllers\Backend\SettingController::class, 'homeSection'])->name('admin.settings.homesection');

});
