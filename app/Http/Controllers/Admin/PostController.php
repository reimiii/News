<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use Auth;
use DB;


class PostController extends Controller
{
  public function show()
  {
    $posts = Post::with('rSubCategory.rCategory')->get();
    return view('admin.post.index', compact('posts'));
  }

  public function create()
  {
    $sub_category = SubCategory::with('rCategory')->get();
    return view('admin.post.create', compact('sub_category'));
  }

  public function store(Request $request)
  {


    $request->validate([
      'sub_category_id' => 'required',
      'post_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'post_title' => 'required',
      'post_detail' => 'required',
      'is_share' => 'required',
      'is_comment' => 'required',

    ]);

    $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
    $ai_id = $q[0]->Auto_increment;

    $now = time();
    $ext = $request->file('post_photo')->extension();
    $file_name = 'post_photo_'.$now.'.'.$ext;
    $request->file('post_photo')->move(public_path('uploads/'), $file_name);

    $post = new Post();
    $post->post_photo = $file_name;
    $post->post_title = $request->post_title;
    $post->post_detail = $request->post_detail;
    $post->sub_category_id = $request->sub_category_id;
    $post->is_share = $request->is_share;
    $post->is_comment = $request->is_comment;
    $post->visitor_count = 0;
    $post->author_id = 0;
    $post->admin_id = Auth::guard('admin')->user()->id;
    $post->save();

    if($request->tags != '')
    {
      $tagsz = [];
      $arry_tags = explode(',',$request->tags);
      for($i=0; $i<count($arry_tags); $i++){
        $tagsz[] = trim($arry_tags[$i]);
      }
      $tagsz = array_values(array_unique($tagsz));
      // $arry_tags = explode(',',$request->tags);
      for($i=0; $i<count($tagsz); $i++)
      {
        $tag = new Tag();
        $tag->post_id = $ai_id;
        $tag->tag_name = strtolower(trim($tagsz[$i]));
        $tag->save();

      }
    }

    return redirect()->route('admin_post_show')->with('success', 'Post Created Successfully');

  }

  public function edit($id)
  {
    $ex_tags = Tag::where('post_id', $id)->get();
    $sub_category = SubCategory::with('rCategory')->get();
    $posts = Post::where('id',$id)->first();
    return view('admin.post.edit', compact('posts', 'sub_category', 'ex_tags'));
  }

  public function tag_delete($id, $id1)
  {
    $tag = Tag::where('id', $id)->first();
    $tag->delete();
    return redirect()->route('admin_post_edit',$id1)->with('success', 'Tag Deleted Successfully');
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'sub_category_id' => 'required',
      'post_title' => 'required',
      'post_detail' => 'required',
      'is_share' => 'required',
      'is_comment' => 'required',

    ]);

    $post = Post::where('id',$id)->first();

    if ($request->hasFile('post_photo')) {

      $request->validate([
        'post_photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
      ]);

      unlink(public_path('uploads/' . $post->post_photo));
      $now = time();
      $ext = $request->file('post_photo')->extension();
      $file_name = 'post_photo_'.$now.'.'.$ext;
      $request->file('post_photo')->move(public_path('uploads/'), $file_name);
      $post->post_photo = $file_name;
    }

    // $post = new Post();
    $post->post_title = $request->post_title;
    $post->post_detail = $request->post_detail;
    $post->sub_category_id = $request->sub_category_id;
    $post->is_share = $request->is_share;
    $post->is_comment = $request->is_comment;
    $post->visitor_count = 0;
    $post->author_id = 0;
    $post->admin_id = Auth::guard('admin')->user()->id;
    $post->update();

    if($request->tags != '')
    {
      $arry_tags = explode(',',$request->tags);
      // $lower = trim($arry_tags[$i]);
      for($i=0; $i<count($arry_tags); $i++)
      {
        $total = Tag::where('post_id', $id)->where('tag_name', strtolower(trim($arry_tags[$i])))->count();

        if(!$total)
        {
          $tag = new Tag();
          $tag->post_id = $id;
          $tag->tag_name = strtolower(trim($arry_tags[$i]));
          $tag->save();
        } else {
          return redirect()->route('admin_post_edit',$id)->with('error', 'Tag '. $request->tags.' Already Exist');
        }
      }
    }

    return redirect()->route('admin_post_show')->with('success', 'Post Updated Successfully');
  }

  public function delete($id)
  {
    $post = Post::where('id', $id)->first();
    unlink(public_path('uploads/' . $post->post_photo));

    $post->delete();
    Tag::where('post_id', $id)->delete();

    return redirect()->route('admin_post_show')->with('success', 'Post Deleted Successfully');
  }
}
