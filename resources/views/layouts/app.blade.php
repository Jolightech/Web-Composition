<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web-Composition')</title>
    <!-- Ajoutez vos liens CSS, scripts, etc. ici -->
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <!-- Ajoutez vos scripts JS ici -->
</body>
</html>
