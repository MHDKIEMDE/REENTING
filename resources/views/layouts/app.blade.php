<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HOME RENTINGS | F! | @yield('title')
    </title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/style.css">
   
    <style>
        body,
        html {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .fx-footer {
            flex-grow: 1;
        }

        .carousel-zoom .carousel-item img {
            transform: scale(1);
            transition: transform 5s ease-in-out;
        }

        .carousel-zoom .carousel-item.active img {
            transform: scale(1.2);
        }

        /* Ajoutez ce style à votre fichier CSS */
        .nav-item:hover .nav-link {
            color: #ff6600;
            /* Changez cette couleur selon vos préférences */
            transition: color 0.3s ease;
            /* Ajoutez une transition pour un effet en douceur */
        }

        /* Ajoutez ce style à votre fichier CSS pour personnaliser l'effet de survol */
        .dropdown-menu .dropdown-item:hover {
            background-color: #ff6600;
            /* Changez cette couleur selon vos préférences */
            color: white;
            transition: background-color 0.3s ease;
            /* Ajoutez une transition pour un effet en douceur */
        }
    </style>
</head>

<body class="bg-secondary">
    <div class="fx-footer">
        <header class="text-light">
            <nav class="navbar navbar-expand-lg p-1 m-1">
                <a class="navbar-brand" href="{{ URL::to('/') }}">[H!!rG]</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex flex-grow-1  justify-content-center">
                        <form class="d-flex" role="search">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success " type="submit">Search</button>
                        </form>
                    </div>
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        <li class="nav-item  hover-zoom">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item hover-zoom">
                            <a class="nav-link" href="{{ route('home.service') }}">Services</a>
                        </li>
                        <li class="nav-item dropdown hover-zoom">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Maisons
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item rounded" href="#">Entrer_coucher</a></li>
                                <li><a class="dropdown-item hover-zoom border rounded" href="#">Deux
                                        (2) pièces</a></li>
                                <li><a class="dropdown-item hover-zoom border  rounded" href="#">Trois
                                        (3) pièces</a></li>
                                <li><a class="dropdown-item hover-zoom border rounded" href="#">Quatre
                                        (4) pièces</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item hover-zoom border border rounded" href="#">Une
                                        Villa</a></li>
                            </ul>
                        </li>
                        <li class="nav-item hover-zoom">
                            <a class="nav-link" href="{{ route('home.contact') }}">Contact</a>
                        </li>
                        <div class="d-flex ms-auto">
                            @if (Route::has('login'))
                                <li class="nav-item d-flex align-items-center">
                                    @auth
                                        <a class="font-semibold text-gray-600 hover-zoom "
                                            href="{{ route('profile.show') }}"
                                            style="text-decoration: none; color:white">{{ auth()->user()->name }}</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="mx-3 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                            style="text-decoration: none; color:rgb(250, 7, 7)">
                                            Logout !
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="hidden hover-zoom">
                                            @csrf
                                        </form>
                                    @else
                                        <a type="button" href="{{ route('login') }}"
                                            class="btn btn-primary nav-link mr-2">Login</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-primary nav-link">Register</a>
                                        @endif
                                    @endauth
                                </li>
                            @endif
                        </div>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <footer class="footer  text-center fw-bold p-2" style="background-color:#b0c4de; ">
        © Copyright Home-rentings. All Rights Reserved
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3XAyGkDmK" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>
