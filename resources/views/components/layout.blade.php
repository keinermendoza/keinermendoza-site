<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('images/site.webmanifest')}}">


        <meta name="title" content="{{ $title }}" />
        <meta name="description" content="{{ $description }}" />
        <link rel="canonical" href="{{ $canonicalURL }}" />

        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $canonicalURL }}" />
        <meta property="og:title" content="{{ $title }}" />
        <meta property="og:description" content="{{ $description }}" />
        <meta property="og:image" content="{{ $socialImageURL }}" />
        <meta property="og:site_name" content="keiner_mendoza" />

        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="{{ $canonicalURL }}" />
        <meta property="twitter:title" content="{{ $title }}" />
        <meta property="twitter:description" content="{{ $description }}" />
        <meta property="twitter:image" content="{{ $socialImageURL }}" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body>
        {{ $slot }}
    </body>
</html>
