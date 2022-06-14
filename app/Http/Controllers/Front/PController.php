<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Photo;


class PController extends Controller {

    public function index()
    {
        $photos = Photo::paginate(10);

        return view('front.photo.index', compact('photos'));
    }

    public function video()
    {
        $videos = Video::paginate(10);

        return view('front.photo.video', compact('videos'));
    }

}
