@extends('layouts.master')

@section('title', 'Message Sent')
@section('description', session('messageSent'))
@section('url', '/contact/sent')
@section('image', asset('/img/preview.jpg'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h1 class="mb-1">Contact Us</h1>
        <p class="mb-5">
          @if (session('messageSent'))
            {{ session('messageSent') }}
          @endif
        </p>
      </div>
    </div>
  </div>
@stop
