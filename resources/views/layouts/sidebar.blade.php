<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Ordre mission') }}</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTable.css') }}" rel="stylesheet">
</head>
<body class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 d-none d-lg-block bg-white position-fixed top-0 bottom-0 d-flex flex-column flex-shrink-0 overflow-auto">
                <h1 class="p-3 px-1">
                    <img src="{{ asset('/images/dashboard/check.svg') }}" class="p-1 rounded img-fluid" style="background: linear-gradient(to right,rgba(255, 196, 42, 1),rgba(247, 67, 22, 1))"/>
                    <span class="fs-4 fw-bold">Livreeo</span>
                </h1>
                <div class="list-group mt-5">
                    <a href="/" class="list-group-item border-0 mb-3 text-muted  {{ request()->is('/') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/monochrome.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Tableau de bord</b>
                    </a>
                    <a href="{{ route('ordres') }}" class="list-group-item border-0 mb-3 text-muted {{ request()->is('ordres') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/personnels.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Commandes</b>
                    </a>
                    <a href="{{ route('produits') }}" class="list-group-item border-0 mb-3 text-muted {{ request()->is('produits') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/personnels.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Produits</b>
                    </a>
                    <a href="{{ route('etudiants') }}" class="list-group-item border-0 mb-3 text-muted   {{ request()->is('etudiants') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/personnels.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Etudiants</b>
                    </a>
                    <a href="{{ route('categories') }}" class="list-group-item border-0 mb-3 text-muted  {{ request()->is('categories') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/missions.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Categories</b>
                    </a>
                    <a href="{{ route('villes') }}" class="list-group-item border-0 mb-3 text-muted  {{ request()->is('villes') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/destinations.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Villes</b>
                    </a>
                    <a href="{{ route('ecoles') }}" class="list-group-item border-0 mb-3 text-muted  {{ request()->is('ecoles') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/vehicules.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Écoles</b>
                    </a>
                    <a href="{{ route('classes') }}" class="list-group-item border-0 mb-3 text-muted  {{ request()->is('classes') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/structures.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Classes</b>
                    </a>
                    <a href="{{ route('matieres') }}" class="list-group-item border-0 mb-3 text-muted  {{ request()->is('matieres') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/missions.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Matieres</b>
                    </a>
                    <a href="{{ route('packs') }}" class="list-group-item border-0 mb-3 text-muted {{ request()->is('packs') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/vehicules.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Packs</b>
                    </a>
                    <a href="{{ route('administrateurs') }}" class="list-group-item border-0 mb-3 text-muted  {{ request()->is('administrateurs') ? 'active':'' }}">
                        <img src="{{ asset('/images/dashboard/parametres.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Administrateurs</b>
                    </a>
                    {{-- <a href="#" class="list-group-item border-0 mb-3 text-muted">
                        <img src="{{ asset('/images/dashboard/parametres.svg') }}" class="img-fluid" />
                        <b class="ms-2 fw-bold text-nowrap text-capitalize">Paramètres</b>
                    </a> --}}
                    <form method="POST" action="{{ route('logout') }}" class="list-group-item border-0 mb-3 text-muted nav-link">
                        @csrf
                        <img src="{{ asset('/images/dashboard/deconnecter.svg') }}" class="img-fluid" />
                        <button type="submit" class="btn text-muted ms-2 fw-bold text-nowrap text-capitalize">Se déconnecter</button>
                    </form>
                </div>
            </div>
            <div class="offset-lg-2 col-lg-10">
                <nav class="navbar navbar-light bg-transparent py-3 pt-4">
                    <div class="container-fluid d-flex justify-content-between">
                        <strong class="navbar-brand fs-4">Aperçu</strong>
                        <form class="flex-grow-1" style="max-width: 50%;">
                            <input class="form-control-lg me-2 bg-white ps-5 border-0 rounded" type="search" placeholder="Rechercher" id="dashboardSearch" style="width: 100%;">
                        </form>
                        <div class="dropdown dropstart">
                            <button class="btn shadow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('usersImages/'. Auth::user()->photo ) }}" class="img-fluid rounded-pill" style="width:50px;height:50px;"/>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{route("administrateur.edit", Auth::id())}}">Profile</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Se déconnecter</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <main class="ms-sm-auto col-lg-10 px-md-4">
     @yield('content')
    </main>
</body>
</html>