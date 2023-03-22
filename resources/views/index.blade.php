<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Zooms Design' }}</title>
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

    <meta name="description" content="{{ $description ?? config('app.meta_description') }}">
    <meta property="og:url" content="{{ $url ?? config('app.url') }}">
    <meta property="og:type" content="{{ $type ?? 'website' }}">
    <meta property="og:title" content="{{  $title ?? config('app.name') }}">
    <meta property="og:image" content="{{ $image ?? 'http://new.zooms.design/images/logo.png?d25c7f4a3a8303ca07bf4e3b763a31de' }}">
    <meta property="og:description" content="{{ $description ?? config('app.meta_description') }}">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5VHVC5G');</script>
    <!-- End Google Tag Manager -->

</head>
<body>
    <div id="app"></div>
    <div id="modal"></div>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js'></script>
</body>
</html>