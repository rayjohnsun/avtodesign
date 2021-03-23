<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
    	return view('site.index');
    }

    public function about()
    {
    	return view('site.about');
    }

    public function category()
    {
    	return view('site.category');
    }

    public function blogHome()
    {
        return view('site.blog-home');
    }

    public function contactUs()
    {
        return view('site.contact-us');
    }

    public function blogDetails()
    {
        return view('site.blog-details');
    }

    public function jobSearch()
    {
        return view('site.job-search');
    }

    public function jobSingle()
    {
        return view('site.job-single');
    }

    public function pricingPlan()
    {
        return view('site.pricing-plan');
    }

    public function elements()
    {
        return view('site.elements');
    }
}
