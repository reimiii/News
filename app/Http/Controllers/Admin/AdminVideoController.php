<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class AdminVideoController extends Controller {

    public function show()
    {
        $videos = Video::get();

        return view('admin.video.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required',
            'caption'  => 'required'
        ]);

        $video = new Video();
        $video->video_id = $request->video_id;
        $video->caption = $request->caption;
        $video->save();

        return redirect()->route('admin_video_show')->with('success', 'Video created successfully');
    }

    public function edit($id)
    {
        $video = Video::where('id', $id)->first();

        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::where('id', $id)->first();

        $request->validate([
            'video_id' => 'required',
            'caption'  => 'required'
        ]);

        $video->video_id = $request->video_id;
        $video->caption = $request->caption;
        $video->save();

        return redirect()->route('admin_video_show')->with('success', 'Video updated successfully');
    }

    public function delete($id)
    {
        $video = Video::where('id', $id)->first();
        $video->delete();

        return redirect()->route('admin_video_show')->with('success', 'Video deleted successfully');
    }

}
