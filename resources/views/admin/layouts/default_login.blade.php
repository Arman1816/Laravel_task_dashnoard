<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
     <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicons/100х100.png').'?v='.env('VERSION', '1') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicons/100х100.png').'?v='.env('VERSION', '1') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicons/100х100.png').'?v='.env('VERSION', '1') }}">

    @yield('head')
    @yield('style')
</head>
<body>

<div class="wrapper">

    <div>
        @yield('content')
    </div>

</div>

@yield('script')
</body>
</html>
