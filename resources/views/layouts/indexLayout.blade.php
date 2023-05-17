<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}}</title>
  @yield('meta')
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @vite('resources/css/app.css')
  @livewireStyles
  @livewireScripts
</head>

<body class="font-sans">

    @yield('content')
    @stack('scripts')

</body>
</html>
