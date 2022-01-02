<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>{{ $title ?? 'Laravel' }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body class="h-screen max-w-screen overflow-hidden">
  <div class="font-sans text-gray-900 antialiased">
    {{ $slot }}
  </div>

  {{$script ?? ''}}
  <script>
    const sr = ScrollReveal()
    config = {
      container : '#container',
      distance: '2rem',
      origin: 'bottom',
      duration: 1000,
      interval: 200,
    }
    sr.reveal('#wrapper-logo', config);
    sr.reveal('#title', config);
    sr.reveal('#company', config);
    sr.reveal('#hero-image', config);
    sr.reveal('#hero-search', config);
    // This book has another container
    sr.reveal('#card-book', {
      ...config,
      reset: true
    });
  </script>
</body>

</html>