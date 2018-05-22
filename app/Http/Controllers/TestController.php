<?php

namespace App\Http\Controllers;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;

use RuntimeException;

class TestController extends Controller
{
  function error ()
  {
    Bugsnag::notifyException(new RuntimeException("Test error"));
  }
}
