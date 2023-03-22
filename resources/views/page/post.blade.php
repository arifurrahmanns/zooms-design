<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap"
        rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css'>
    <link rel='stylesheet' href='https://kenwheeler.github.io/slick/slick/slick-theme.css'>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="32x32">

    <meta name="description" content="{{ $description }}">
    <meta property="og:url" content="{{ $url }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{  $title }}">
    <meta property="og:image" content="{{ $image }}">
    <meta property="og:description" content="{{ $description }}">
</head>
<body>
    <h1>{{ $title }}</h1>
    <script>
        window.onload = () => {
            window.location.href = '{{ $url }}'
        }
    </script>
</body>
</html>