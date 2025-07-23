<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Bootstrap</title>
    <!-- Bootstrap CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
      
       
    </style>
</head>
<body>
    <!-- Header -->
    @include('layout.header')
    
    <!-- Sidebar -->
    @include('layout.sidebar')


    <!-- Main Content (để trống theo yêu cầu) -->
    <main class="main-content">
            @yield('content')
    </main>

    <!-- Footer -->
    @include('layout.footer')
    <!-- Bootstrap JS and Popper -->
</body>
</html>