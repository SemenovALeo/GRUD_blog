<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
    @stack('css')
    <title>@yield('page.title', config('app.name'))</title>
    <style>
        .container{max-width: 720px}
        .required:after{ content: '*'; color: red; }
    </style>
</head>
<body>

<div class="d-flex flex-column justify-content-between min-vh-100 ">

    @include('includes.header')

    <main class="flex-grow-1 py-3">
        @yield('content')
    </main>

    @include('includes.footer')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.min.js">
</script>
@stack('js')
</body>
</html>

