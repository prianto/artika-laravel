<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class SearchController extends Controller
{
  function result (Request $request)
  {
    $q = null;
    $req_q = $request->q;
    if(strlen($req_q)) {
      $q = strip_tags($req_q);
      $q = preg_replace('/[^A-Za-z0-9\s\-]/', '', $q);
      $q = trim(strtolower($q));
    }

    $latest_posts = Post::where('post_type', 'article')
      ->where('is_active', 1)
      ->where('published_at', '<', date('Y-m-d H:i:s'))
      ->when($q, function ($query) use ($q) {
        return $query->where(function($query) use ($q) {
          $query->where('title', 'like', '%' . $q . '%')
            ->orWhere('excerpt', 'like', '%' . $q . '%');
        });
      })
      ->orderBy('published_at', 'DESC')
      ->paginate(6);

    return view('post.result', [
      'latest_posts' => $latest_posts,
      'q' => $q
    ]);
  }

}
