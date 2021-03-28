<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/search', [App\Http\Controllers\IndexController::class, 'search'])->name('index_search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/site', [App\Http\Controllers\SiteController::class, 'index'])->name('site_home');
Route::get('/site/about', [App\Http\Controllers\SiteController::class, 'about'])->name('site_about');
Route::get('/site/category', [App\Http\Controllers\SiteController::class, 'category'])->name('site_category');
Route::get('/site/blog-home', [App\Http\Controllers\SiteController::class, 'blogHome'])->name('site_blog_home');
Route::get('/site/blog-details', [App\Http\Controllers\SiteController::class, 'blogDetails'])->name('site_blog_details');
Route::get('/site/contact-us', [App\Http\Controllers\SiteController::class, 'contactUs'])->name('site_contact_us');
Route::get('/site/job-search', [App\Http\Controllers\SiteController::class, 'jobSearch'])->name('site_job_search');
Route::get('/site/job-single', [App\Http\Controllers\SiteController::class, 'jobSingle'])->name('site_job_single');
Route::get('/site/pricing-plan', [App\Http\Controllers\SiteController::class, 'pricingPlan'])->name('site_pricing_plan');
Route::get('/site/elements', [App\Http\Controllers\SiteController::class, 'elements'])->name('site_elements');

// Route::get('/admin/index', [App\Http\Controllers\AdminController::class, 'ads'])->name('admin_index');

Route::resource('ads', App\Http\Controllers\AdsController::class)->middleware('is_admin');
Route::resource('car-models', App\Http\Controllers\CarModelsController::class)->middleware('is_admin');
Route::resource('cities', App\Http\Controllers\CitiesController::class)->middleware('is_admin');
Route::resource('colors', App\Http\Controllers\ColorsController::class)->middleware('is_admin');
Route::resource('marks', App\Http\Controllers\MarksController::class)->middleware('is_admin');
Route::resource('regions', App\Http\Controllers\RegionsController::class)->middleware('is_admin');

Route::resource('/user-ads', App\Http\Controllers\UserAdsController::class)->middleware('is_user');

Route::get('/user/account', [App\Http\Controllers\UserController::class, 'index'])->name('user_account');
Route::get('/user/message', [App\Http\Controllers\UserController::class, 'message'])->name('user_message');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
