<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisment;
use App\Models\TopAds;



class HomeController extends Controller
{
  public function index()
  {
    $home_ads = HomeAdvertisment::where('id', 1)->first();
    return view('front.home', compact('home_ads'));
  }
}
