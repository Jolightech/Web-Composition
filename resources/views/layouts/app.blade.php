<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web-Composition')</title>

    <!-- Ajoutez d'autres balises meta, feuilles de style, etc., selon vos besoins -->

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Incluez le fichier CSS généré par Laravel Mix -->

    @yield('styles') <!-- Incluez des styles spécifiques à certaines vues -->
</head>
<body>
    <header>
        <!-- Barre de navigation, entête, etc. -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Web-Composition</a>
            <!-- Ajoutez d'autres éléments de la barre de navigation selon vos besoins -->
        </nav>
    </header>

    <main class="container mt-4">
        <!-- Contenu principal de la page -->
        @yield('content') <!-- C'est là que le contenu spécifique de chaque vue sera injecté -->
    </main>

    <footer class="mt-4">
        <!-- Pied de page, informations de copyright, etc. -->
    </footer>

    <script src="{{ mix('js/app.js') }}"></script>
    <!-- Incluez le fichier JS généré par Laravel Mix -->

    @yield('scripts') <!-- Incluez des scripts spécifiques à certaines vues -->
</body>
</html>
