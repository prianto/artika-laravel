@extends('layouts.master')

@section('title', $page->title)
@section('description', 'Page ' . $page->title . '.')
@section('url', '/page/' . $page->slug)
@section('image', asset('/img/preview.jpg'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h1>{{ $page->title }}</h1>
        {!! html_entity_decode($page->content) !!}
      </div>
    </div>
  </div>
@stop
