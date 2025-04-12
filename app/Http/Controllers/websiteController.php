<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class websiteController extends Controller
{
    public function homePage()
    {
        return view('website.home');
    }
}
