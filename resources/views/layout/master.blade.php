<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Bootstrap CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles') <!-- Thêm stack cho CSS nếu cần -->
</head>
<body>
    <!-- Header -->
    @include('layout.header')
    
    <!-- Sidebar -->
    @include('layout.sidebar')

    <!-- Main Content -->
    <main class="main-content p-4">
        <h4 class="page-title">{{ $title }}</h4>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layout.footer')

    <!-- jQuery và Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @stack('scripts') <!-- Thêm stack cho scripts -->
</body>
</html>