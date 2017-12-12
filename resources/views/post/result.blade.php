@php
  use Carbon\Carbon;
@endphp

@extends('layouts.master')

@section('title', 'Search ' . $q)
@section('description', 'SeaSearch the articles, including images, videos and more.')
@section('url', '/search')
@section('image', asset('/img/preview.jpg'))

@section('content')
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h1 class="mb-4">Search</h1>
        <form name="sentKeyword" action="{{ url('search') }}" method="get">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Please type keywords..." value="{{ $q }}" name="q" />
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </span>
          </div>
        </form>
        @foreach($latest_posts as $post)
          <div class="post-preview">
            <h4>
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
            <p>
              {{ $post->excerpt }}
            </p>
          </div>
          @if (!$loop->last)
            <hr />
          @endif
        @endforeach
      </div>
    </div>
    @if(strlen($q))
      {{ $latest_posts->appends(['q' => $q])->links('vendor.pagination.bootstrap-4') }}
    @else
      {{ $latest_posts->links('vendor.pagination.bootstrap-4') }}
    @endif
  </div>
@stop
