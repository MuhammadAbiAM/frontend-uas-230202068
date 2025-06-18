<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Sistem Informasi Kesehatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
            text-decoration: none;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .navbar-custom {
            background-color: #0d6efd;
        }
    </style>
</head>
<body>

    @include('layouts.sidebar')

    <div class="content">
        @include('layouts.navbar')
        
        <div class="container-fluid mt-3">
            @yield('content')
        </div>

        @include('layouts.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
