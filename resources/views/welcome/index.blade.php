@php
  use Carbon\Carbon;
@endphp

@extends('layouts.master')

@section('title', 'Welcome')
@section('description', 'Welcome to Artika Laravel.')
@section('url', '/')
@section('image', asset('/img/preview.jpg'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="siema-container">
          @if(count($sliders) > 0)
            @foreach ($sliders as $slider)
              <div class="siema-slide">
                <img src="https://picsum.photos/1600/900/?image={{ $slider->picsum_id }}" alt="" />
                <div class="siema-caption">
                  <h4><a href="{{ url($slider->slug) }}">{{ $slider->title }}</a></h4>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="container">
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
  </div>
@stop
