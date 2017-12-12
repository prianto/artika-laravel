<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <!--[if IEMobile]><meta http-equiv="cleartype" content="on" /><![endif]-->
    <meta name="MobileOptimized" content="320" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="@yield('description') This is a sample project built with Laravel and Bootstrap." />
    <meta name="author" content="@prianto" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:alt" content="Artika Laravel" />
    <meta name="twitter:site" content="@prianto">

    <meta property="og:title" content="@yield('title') - Artika Laravel" />
    <meta property="og:description" content="@yield('description') This is a sample project built with Laravel and Bootstrap." />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:url" content="{{'https://artika-laravel.herokuapp.com'}}@yield('url')" />
    <meta property="og:site_name" content="Prianto" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400italic,400" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/clean-blog.css') }}" rel="stylesheet" />
    <link href="/favicon.ico" rel="icon" />

    <title>@yield('title') - Artika Laravel</title>
  </head>

  <body>
    @include('partials.menu')
    <main id="panel">
      <div id="panel-content">
        @include('partials.navbar')
        @yield('content')
        @include('partials.footer')
      </div>
    </main>

    <script src="{{ asset('js/slideout.min.js') }}"></script>
    <script src="{{ asset('js/siema.min.js') }}"></script>
    <script src="{{ asset('js/clean-blog.js') }}"></script>
  </body>
</html>
