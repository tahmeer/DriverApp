<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class websiteController extends Controller
{
    public function homePage()
    {
        return view('website.home');
    }
    public function aboutUsPage()
    {
        return view('website.about-us');
    }
    public function ourVehiclesPage()
    {
        return view('website.our-vehicles');
    }
    public function sectorPage()
    {
        return view('website.sector');
    }
    public function paymentPage()
    {
        return view('website.payment');
    }
    public function driverRecruitmentPage()
    {
        return view('website.driver-recruitment');
    }
    public function contactUsPage()
    {
        return view('website.contact-us');
    }
}
