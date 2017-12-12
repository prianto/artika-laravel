<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

use App\Post;

class WelcomeController extends Controller
{
  function index () {
    $sliders = $this->get_sliders();

    $slider_ids = $this->get_slider_ids();

    $latest_posts = Cache::get('welcome_latest_posts', function () use ($slider_ids) {
      return Post::where('post_type', 'article')
        ->where('is_active', 1)
        ->where('published_at', '<', date('Y-m-d H:i:s'))
        ->whereNotIn('id', $slider_ids)
        ->orderBy('published_at', 'DESC')
        ->limit(6)
        ->get();
    });

    return view('welcome.index', [
      'sliders' => $sliders,
      'latest_posts' => $latest_posts
      ]
    );
  }

  protected function get_sliders () {
    $sliders = Cache::get('sliders', function () {
      return Post::where('post_type', 'article')
        ->where('is_feature', 1)
        ->where('is_active', 1)
        ->where('published_at', '<', date('Y-m-d H:i:s'))
        ->orderBy('published_at', 'DESC')
        ->limit(3)
        ->get();
    });

    return $sliders;
  }

  public function get_slider_ids () {
    $sliders = $this->get_sliders();

    $slider_ids = Cache::get('slider_ids', function () use ($sliders) {
      $slider_ids = [];
      foreach ($sliders as $slider) {
        $slider_ids[] = $slider->id;
      }
      return $slider_ids;
    });

    return $slider_ids;
  }
  
}
