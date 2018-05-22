<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

class ContactController extends Controller
{
  function submit (Request $request)
  {
    return redirect('contact/sent')->with('messageSent', 'Message sent! We\'ll reply to you as soon as possible.');

    $ip_address = $request->ip();
    $name = $request->name;
    $email = $request->email;
    $phone = $request->phone;
    $subject = $request->subject;
    $message = $request->message;

    $contact = new Contact();
    $contact->ip_address = $ip_address;
    $contact->name = e($name);
    $contact->email = e($email);
    $contact->phone = e($phone);
    $contact->subject = e($subject);
    $contact->message = e($message);

    if ($request->hasFile('attachment')) {
      // Get file
      // $file = $request->file('attachment');
      // Display File Name
      // $file->getClientOriginalName();
      // Display File Extension
      // $file->getClientOriginalExtension();
      // Display File Real Path
      // $file->getRealPath();
      // Display File Size
      // $file->getSize();
      // Display File Mime Type
      // $file->getMimeType();
      // Move Uploaded File
      // $destinationPath = 'uploads';
      // $file->move($destinationPath,$file->getClientOriginalName());
      $file = $request->file('attachment');
      $target_file_name = md5(uniqid()) . '.' . $file->getClientOriginalExtension();
      $path = $file->storeAs(
        'public', $target_file_name
      );
      $contact->attachment = $target_file_name;
    }

    $contact->save();
    return redirect('contact/sent')->with('messageSent', 'Message sent! We\'ll reply to you as soon as possible.');
  }

}
