@extends("layouts.sidebar")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">Modifier administrateur <a href="{{route("administrateurs")}}" class="btn btn-secondary float-end">Retour</a></h3>
            <form action="{{ route('administrateur.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 text-center" >
                    <img src="{{  asset('usersImages/'.$user->photo) }}" class="img-fluid rounded-pill border" style="width:100px;height:100px;"/>
                </div>
                <div class="mb-3">

                    <label class="" for="nom">Nom :</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" 
                        placeholder="Nom" value="{{ $user->nom }}"/>
                        @error('nom')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="nom">Prenom :</label>
                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" 
                         value="{{ $user->prenom }}" placeholder="prenom"/>
                        @error('prenom')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="email">Email :</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                         value="{{ $user->email }}"  placeholder="Email"/>
                        @error('email')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="tel">Tel :</label>
                    <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" 
                        placeholder="tel" value="{{ $user->tel }}"/>
                        @error('tel')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="date">Date u :</label>
                    <input type="date" class="form-control @error('date_u') is-invalid @enderror" name="date_u" 
                        placeholder="date_u" value="{{ $user->date_u }}"/>
                        @error('date_u')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="prix">Photo :</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" 
                        placeholder="photo" value="{{ $user->photo }}"  accept="image/png,image/jpeg"/>
                        @error('photo')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="old_password">Mote de passe actual:</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" 
                        placeholder="Mote de passe actual" value="{{ old('old_password') }}"/>
                        @error('old_password')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="new_password">Nouveau mot de passe:</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" 
                        placeholder="Nouveau mote de passe" value="{{ old('new_password') }}"/>
                        @error('new_password')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="password">Confirmation de Mote de passe:</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" 
                        placeholder="Mote de passe" value="{{ old('password_confirmation') }}"/>
                        @error('password_confirmation')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Modifer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection