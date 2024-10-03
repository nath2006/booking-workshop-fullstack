<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @stack('before-styles')
        <link href="{{asset('css/output.css')}}" rel="stylesheet">
        @stack('after-styles')
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="assets/neue-plak-webfont/neue-plak.css">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        />

    </head>
    <body>
        @yield('content')

        @stack('before-scripts')
        @stack('after-scripts')
    </body>
</html/>
