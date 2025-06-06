<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <script> src="{{asset('assets/js/bootstrap.js')}}"</script>
    <script> src="{{asset('assets/js/bootstrap.bundle.js')}}"</script>
    <title>@yield('title','Свежий взгляд')</title>
</head>
<body>
@include('components.header')
@yield('content')
</body>
</html>
