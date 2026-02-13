<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Maroon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-maroon { background-color: #800000; }
        .text-maroon { color: #800000; }
        .border-maroon { border-color: #800000; }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-maroon p-4 text-white shadow-lg">
        <div class="container mx-auto flex justify-between">
            <h1 class="font-bold uppercase">My Profile</h1>
            <div class="space-x-4">
                <a href="{{ url('/') }}" class="hover:underline">Home</a>
                <a href="{{ url('/portfolio') }}" class="hover:underline">Portofolio</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-10 p-4">
        @yield('content')
    </div>
</body>
</html>