@extends('layouts.master')

@section('title', 'Contact Us')
@section('description', 'Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible.')
@section('url', '/contact')
@section('image', asset('/img/preview.jpg'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h1 class="mb-4">Contact Us</h1>
        <div class="alert alert-warning text-center" role="alert">
          <small>This project is intended for testing purpose only. The sent message will be discarded.</small>
        </div>
        <p class="mb-1">Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible.</p>
        <form name="sentMessage" id="contactForm" method="post" action="{{ url('contact') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Your Name</label>
              <input type="text" class="form-control" placeholder="Your Name" name="name" required />
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" class="form-control" placeholder="Email Address" name="email" required />
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Phone Number</label>
              <input type="tel" class="form-control" placeholder="Phone Number" name="phone" />
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Subject</label>
              <input type="text" class="form-control" placeholder="Subject" name="subject" required />
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" name="message" required></textarea>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Attachment</label>
              <input type="file" class="form-control" placeholder="Attachment" name="attachment" title="Format .txt; Max. 1 Kb" />
              <p class="help-block"></p>
            </div>
          </div>
          <br />
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-secondary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop
