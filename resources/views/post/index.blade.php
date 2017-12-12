@php
  use Carbon\Carbon;
@endphp

@extends('layouts.master')
@if($category_name != false)
  @section('title', $category_name . ' Category')
  @section('description', "Latest articles in '$category_name' category.")
@endif
@if($user_displayed_name != false)
  @section('title', $user_displayed_name . '\'s articles')
  @section('description', $user_displayed_name . '\'s latest articles.')
@endif
@section('url', $url)
@section('image', asset('/img/preview.jpg'))

@section('content')
  <div class="container">
    @if($category_name != false)
      <h1 class="mb-4">Category: <small>{{ $category_name }}</small></h1>
    @endif
    @if($user_displayed_name != false)
      <h1 class="mb-4">{{ $user_displayed_name }}<small>'s articles</small></h1>
    @endif
    <div class="row">
      @if(count($latest_posts) > 0)
        @foreach ($latest_posts as $post)
          <div class="col-12 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="{{ url($post->slug) }}">
                <img class="card-img-top lazy" src="{{ asset('img/dummy.png') }}" data-src="https://picsum.photos/1600/900/?image={{ $post->picsum_id }}" alt="" />
              </a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="{{ url($post->slug) }}">{{ $post->title }}</a>
                </h4>
                <small class="post-meta">
                  <a href="{{ url('user/' . $post->user->name) }}">{{ $post->user->displayed_name }}</a>,
                  <a href="{{ url('category/' . $post->category->slug) }}">{{ $post->category->name }}</a>,
                  @php
                  $carbon = new Carbon($post->published_at);
                  @endphp
                  {{ $carbon->diffForHumans() }}
                </small>
                <p class="card-text">{{ $post->excerpt }}</p>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
    {{ $latest_posts->links('vendor.pagination.bootstrap-4') }}
  </div>
@stop
