<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisment;
use App\Models\TopAds;
use App\Models\setting;
use App\Models\Post;


class HomeController extends Controller
{
  public function index()
  {
    $home_ads = HomeAdvertisment::where('id', 1)->first();
    $setting = setting::where('id', 1)->first();
    $post = Post::with('rSubCategory')->orderBy('id', 'desc')->get();



    return view('front.home', compact('home_ads', 'setting', 'post'));
  }
}
