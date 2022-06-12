<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
  public function show()
  {
    $photos = Photo::get();
    return view('admin.photo.index', compact('photos'));
  }

  public function create()
  {
    return view('admin.photo.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'caption' => 'required',
    ]);

    $now = time();
    $ext = $request->file('photo')->extension();
    $file_name = 'photo_'.$now.'.'.$ext;
    $request->file('photo')->move(public_path('uploads/'), $file_name);

    $photo = new Photo();
    $photo->caption = $request->caption;
    $photo->photo = $file_name;
    $photo->save();

    return redirect()->route('admin_photo_show')->with('success', 'Photo created successfully');

  }

  public function edit($id)
  {
    $photo = Photo::where('id',$id)->first();
    return view('admin.photo.edit', compact('photo'));
  }

  public function update(Request $request, $id)
  {
    $photo = Photo::where('id',$id)->first();

    $request->validate([
      'caption' => 'required',
    ]);

    if ($request->hasFile('photo')) {

      $request->validate([
        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
      ]);

      unlink(public_path('uploads/' . $photo->photo));
      $now = time();
      $ext = $request->file('photo')->extension();
      $file_name = 'photo_'.$now.'.'.$ext;
      $request->file('photo')->move(public_path('uploads/'), $file_name);
      $photo->photo = $file_name;
    }

    $photo->caption = $request->caption;
    $photo->update();

    return redirect()->route('admin_photo_show')->with('success', 'Photo updated successfully');
  }

  public function delete($id)
  {
    $photo = Photo::where('id',$id)->first();
    unlink(public_path('uploads/' . $photo->photo));
    $photo->delete();
    return redirect()->back()->with('success', 'Photo deleted successfully');
  }


}
