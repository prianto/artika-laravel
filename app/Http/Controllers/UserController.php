<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\User;

class UserController extends Controller
{
  function single (Request $request)
  {
    $name = $request->name;

    $user = User::where('name', 'like', $name)
      ->firstOrFail();

    $user_id = $user->id;
    $user_displayed_name = $user->displayed_name;

    $latest_posts = Post::where('post_type', 'article')
      ->where('is_active', 1)
      ->where('published_at', '<', date('Y-m-d H:i:s'))
      ->where('user_id', $user_id)
      ->orderBy('published_at', 'DESC')
      ->paginate(6);

    return view('post.index', [
      'latest_posts' => $latest_posts,
      'category_name' => false,
      'user_displayed_name' => $user_displayed_name,
      'url' => '/user/' . $name
    ]);
  }

}
