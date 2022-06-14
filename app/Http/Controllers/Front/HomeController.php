<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\HomeAdvertisment;
use App\Models\setting;
use App\Models\Post;
use App\Models\SubCategory;


class HomeController extends Controller
{
  public function index()
  {
    $home_ads = HomeAdvertisment::where('id', 1)->first();
    $setting = setting::where('id', 1)->first();
    $post = Post::with('rSubCategory')->orderBy('id', 'desc')->get();
    $subcategory = SubCategory::with('rPost')->orderBy('sub_category_order', 'asc')->where('show_on_home', 'Show')->get();
    $video = Video::get();

    return view('front.home', compact('home_ads', 'setting', 'post', 'subcategory', 'video'));
  }
}
