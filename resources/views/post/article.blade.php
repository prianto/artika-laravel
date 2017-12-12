@php
  use Carbon\Carbon;
@endphp

@extends('layouts.master')

@section('title', 'Page Title')
@section('description', $article->excerpt)
@section('url', '/' . $article->slug)
@section('image', 'https://picsum.photos/1024/558/?image=' . $article->picsum_id)

@section('content')
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h1>{{ $article->title}}</h1>
          <small class="post-meta">
            <a href="{{ url('user/' . $article->user->name) }}">{{ $article->user->displayed_name }}</a>,
            <a href="{{ url('category/' . $article->category->slug) }}">{{ $article->category->name }}</a>,
            @php
            $carbon = new Carbon($article->published_at);
            @endphp
            {{ $carbon->diffForHumans() }}
          </small>
          <p class="subtitle">{!! html_entity_decode($article->excerpt) !!}</p>
          <img class="img-fluid" src="https://picsum.photos/1600/900/?image={{ $article->picsum_id }}" alt="" />
          <span class="caption text-muted text-left">{{ $article->unsplash->caption }} <em>({{ $article->unsplash->author }})</em></span>
          {!! html_entity_decode($article->content) !!}
        </div>
      </div>
    </div>
  </article>
@stop
