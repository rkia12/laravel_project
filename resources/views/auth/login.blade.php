@extends('layouts.app')
@section("content")
<section>
    <div class="container-fluid login-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-8 d-flex flex-column justify-content-center position-relative">
                <h1 class="text-white text-center">LIVREEO.MA</h1>
                <p class="text-white text-center">
                    Un moyen facile de gérer votre Commandes
                </p>
                <figure class="position-absolute bottom-0 start-0">
                    <svg width="431" height="280" viewBox="0 0 431 280" 
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="152.5" cy="304.5" r="278" stroke="#F48116"/>
                        <circle cx="71.5" cy="278.5" r="278" stroke="#F48116"/>
                    </svg>
                </figure>
            </div>
            <div class="col-md-6 col-lg-4 d-flex flex-column flex-fill justify-content-center p-5">
                @if (session('error'))
                    <div class="text-danger text-center">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <h2> {{ __("Bonjour") }} !</h2>
                        <p>{{ __("Bienvenue") }}</p>
                    </div>
                    <div class="mb-4">
                        {{-- <x-carbon-apple/> --}}
                        <label for="username" class="form-label visually-hidden">Adresse e-mail :</label>
                        <input type="email" class="form-control rounded-pill py-2 ps-5 bg-white @error('email') is-invalid @enderror" id="username"
                                name="email" placeholder="Adresse e-mail" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label sr-only visually-hidden">Mot de passe :</label>
                        <input type="password" class="form-control rounded-pill py-2 ps-5 bg-white @error('password') is-invalid @enderror" id="password" 
                                    name="password" placeholder="Mot de passe" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-grid">
                        <button class="btn btn-mine rounded-pill py-2 text-white">
                            S'identifier
                        </button>
                        <small class="my-2 text-center text-warning">{{ __("Mot de passe pérdu ?") }}</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection