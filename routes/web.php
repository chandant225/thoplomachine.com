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
// Route::get('/service/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'serviceDetail']);
// our teams
Route::get('/our-team', [App\Http\Controllers\Frontend\FrontendController::class, 'ourTeam']);
Route::get('/thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

// blog
Route::get('/blogs', [App\Http\Controllers\Frontend\FrontendController::class, 'Blog']);
Route::get('/searchby/{category}', [App\Http\Controllers\Frontend\FrontendController::class, 'blogCategory']);
Route::get('/blog/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'blogDetail']);

//services
Route::get('/services', [App\Http\Controllers\Frontend\FrontendController::class,'services']);
Route::get('/service/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'serviceDetails']);

//producsts
Route::get('products', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('product/shop', [App\Http\Controllers\Frontend\FrontendController::class, 'productDetails']);

Route::get('/page/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'page_details'])->name('page.details');

Route::get('/blogs/hydro-siren', function() {
    return view('hydro-siren');
});

