<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Herta Stories')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-espresso text-cream font-sans min-h-screen flex flex-col">

    @include('partials.navbar')

    <main class="flex-1 max-w-2xl w-full mx-auto px-4 py-8">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>