<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HOME RENTINGS | F!</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
    </style>
</head>

<body class="bg-secondary">
    <div class="fx-footer">
        <header class="text-light">
            <nav class="navbar navbar-expand-lg p-3">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('dema.showAllHouses') }}">Dema</a>
                    <button class="navbar-toggler " type="button " data-bs-toggle="collapse "
                        data-bs-target="#navbarSupportedContent " aria-controls="navbarSupportedContent "
                        aria-expanded="false " aria-label="Toggle navigation ">
                        <span class="navbar-toggler-icon "></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent ">
                        <div class="d-flex flex-grow-1  justify-content-center">
                            <form class="d-flex" role="search">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-success " type="submit">Search</button>
                            </form>
                        </div>
                        <ul class="navbar-nav  mb-2 mb-lg-0">
                            <li class="nav-item hover-zoom">
                                <a class="nav-link" href="{{ route('dema.home') }}">Home</a>
                            </li>
                            <li class="nav-item hover-zoom">
                                <a class="nav-link" href="{{ route('dema.service') }}">Services</a>
                            </li>
                            <li class="nav-item hover-zoom">
                                <a class="nav-link" href="{{ route('dema.showAllHouses') }}">Mes propriétés</a>
                            </li>
                            <li class="nav-item hover-zoom">
                                <a class="nav-link" href="{{ route('dema.aproposDeNous') }}">Apropos</a>
                            </li>
                            <li class="nav-item hover-zoom">
                                <a class="nav-link hover-zoom" href="{{ route('dema.contact') }}">Contact</a>
                            </li>
                            <div class="d-flex ms-auto" style="margin-left: 10px">
                                @if (Route::has('login'))
                                    <li class="nav-item d-flex align-items-center">
                                        @auth
                                            <a class="font-semibold text-gray-600  hover-zoom "
                                                href="{{ route('profile.show') }}"
                                                style="text-decoration: none; color:white">{{ auth()->user()->name }}</a>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                class="mx-3 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 hover-zoom"
                                                style="text-decoration: none; color:rgb(250, 7, 7)"> Logout !</i>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="hidden">
                                                @csrf
                                            </form>
                                        @else
                                            <a type="button" href="{{ route('login') }}"
                                                class="btn btn-primary nav-link mr-2">Login</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}"
                                                    class="btn btn-primary nav-link">Register</a>
                                            @endif
                                        @endauth
                                    </li>
                                @endif
                            </div>
                        </ul>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
