<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Orbitron:wght@400;600;700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-100 antialiased bg-haloGray">
    <div class="min-h-screen flex flex-col justify-between">
        <!-- Navbar -->
        <nav class="bg-haloGray text-gray-100 py-4 shadow-lg">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/" class="group font-bold text-3xl flex items-center space-x-4">
                    <x-application-logo class="w-10 h-10 fill-current text-gray-100 group-hover:text-yellow-500 transition" />
                    <span class="text-yellow-500">POKEDEXIA</span>
                </a>
                <div class="flex items-center space-x-6">
                    <a class="font-bold hover:text-yellow-500 transition" href="/">POKEMON</a>
                    <a class="font-bold hover:text-yellow-500 transition" href="{{ route('about.index') }}">À propos</a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="font-bold hover:text-yellow-500 transition">Admin Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="font-bold hover:text-yellow-500 transition">Déconnexion</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-bold hover:text-yellow-500 transition">Se connecter</a>
                        <a href="{{ route('register') }}" class="ml-4 font-bold hover:text-yellow-500 transition">S'inscrire</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto py-8">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-haloGray text-gray-100 py-8">
            <div class="container mx-auto flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <ul class="flex space-x-4">
                    <li><a href="https://www.facebook.com/votre-page-facebook" class="hover:text-yellow-500 transition" target="_blank">Facebook</a></li>
                    <li><a href="https://twitter.com/votre-compte-twitter" class="hover:text-yellow-500 transition" target="_blank">Twitter</a></li>
                    <li><a href="https://www.instagram.com/votre-compte-instagram" class="hover:text-yellow-500 transition" target="_blank">Instagram</a></li>
                    <li><a href="https://www.linkedin.com/in/votre-profil-linkedin" class="hover:text-yellow-500 transition" target="_blank">LinkedIn</a></li>
                    <li><a href="https://www.pinterest.com/votre-compte-pinterest" class="hover:text-yellow-500 transition" target="_blank">Pinterest</a></li>
                </ul>
                <div class="text-center md:text-right text-yellow-500 font-bold">
                    &copy; POKEDEXIA - Mohammed MALHA &copy
                </div>
            </div>
        </footer>
    </div>

</body>

</html>
