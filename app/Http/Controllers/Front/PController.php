<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;


class PController extends Controller
{
  public function index()
  {
    $photos = Photo::paginate(10);
    return view('front.photo.index', compact('photos'));
  }
}
