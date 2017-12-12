<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;

  /**
   * Get the user that owns the post.
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  /**
   * Get the user that owns the post.
   */
  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  /**
   * The unsplashes that belong to the post.
   */
  public function unsplash()
  {
    return $this->belongsTo('App\Unsplash', 'picsum_id', 'picsum_id');
  }
}
