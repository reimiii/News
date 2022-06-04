<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Tag;

class NewsPostController extends Controller
{
  public function detail($id)
  {
    $tags = Tag::where('post_id', $id)->get();

    $post = Post::with('rSubCategory')->where('id', $id)->first();
    if($post->author_id == 0)
    {
      $user_data = Admin::where('id', $post->admin_id)->first();
      // dd($user_data->name);
    } else
    {
      // Nanti dulu
    }

    // update visitor count
    $new_value = $post->visitor_count + 1;
    $post->visitor_count = $new_value;
    $post->update();
    // dd($post->visitor_count);

    // time
    $time = strtotime($post->updated_at);
    $final_time = date('d F Y', $time);


    return view('front.news_post.index',
      compact('post', 'user_data', 'final_time', 'tags')
    );
  }
}
