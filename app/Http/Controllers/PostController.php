<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
  function article (Request $request)
  {
    $slug = $request->slug;

    $article = Post::where('slug', 'like', $slug)
      ->where('post_type', 'article')
      ->where('is_active', 1)
      ->where('published_at', '<', date('Y-m-d H:i:s'))
      ->firstOrFail();

    return view('post.article', ['article' => $article]);
  }

  function page (Request $request)
  {
    $slug = $request->slug;

    $page = Post::where('slug', 'like', $slug)
      ->where('post_type', 'page')
      ->where('is_active', 1)
      ->where('published_at', '<', date('Y-m-d H:i:s'))
      ->firstOrFail();

    return view('post.page', ['page' => $page]);
  }

}
