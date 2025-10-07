<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hiring Portal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="font-sans antialiased bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-50">
        <x-header-component />
    </header>

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <x-sidebar-component />

        <main class="max-w-full m-auto">
        @yield('content')
         </main>

    </div>

    <!-- Footer -->
       <footer class="bg-white shadow sticky top-0 z-50">
        <x-footer-component />
    </footer>

    <!-- Scripts -->
</body>
</html>
