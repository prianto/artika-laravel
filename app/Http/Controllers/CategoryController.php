<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Category;

class CategoryController extends Controller
{
  function all (Request $request) {
    $welcome = new WelcomeController();
    $slider_ids = $welcome->get_slider_ids();

    $latest_posts = Post::where('post_type', 'article')
      ->where('is_active', 1)
      ->where('published_at', '<', date('Y-m-d H:i:s'))
      ->whereNotIn('id', $slider_ids)
      ->orderBy('published_at', 'DESC')
      ->paginate(6);

    return view('post.index', [
      'latest_posts' => $latest_posts,
      'category_name' => 'All',
      'user_displayed_name' => false,
      'url' => '/category/all'
    ]);
  }

  function single (Request $request) {
    $slug = $request->slug;

    $category = Category::where('slug', 'like', $slug)
      ->firstOrFail();

    $category_id = $category->id;
    $category_name = $category->name;

    $latest_posts = Post::where('post_type', 'article')
      ->where('is_active', 1)
      ->where('published_at', '<', date('Y-m-d H:i:s'))
      ->where('category_id', $category_id)
      ->orderBy('published_at', 'DESC')
      ->paginate(6);

    return view('post.index', [
      'latest_posts' => $latest_posts,
      'category_name' => $category_name,
      'user_displayed_name' => false,
      'url' => '/category/' . $slug
    ]);
  }

}
