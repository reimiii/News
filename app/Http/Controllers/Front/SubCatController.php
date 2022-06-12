<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Post;


class SubCatController extends Controller
{
  public function index($id)
  {
    $subcategory = SubCategory::where('id', $id)->first();
    $post_data = Post::where('sub_category_id', $id)
      ->orderBy('id', 'desc')
      ->paginate(4);
    return view('front.subcat', compact('subcategory', 'post_data'));
  }
}
