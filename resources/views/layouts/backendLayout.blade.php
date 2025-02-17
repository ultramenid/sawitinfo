<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/fa5to5aij0r418tqooxyrmncb8eapldn87crb04im234j80z/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/dark.js') }}"></script>


</head>
<body class="selection-bg dark:selection-bg bg-gray-100 dark:bg-newgray-900  font-sans">

    @yield('content')

    @livewireScripts
    {{-- <x-toaster-hub /> --}}

</body>
</html>
