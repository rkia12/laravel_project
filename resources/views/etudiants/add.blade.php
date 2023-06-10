@extends("layouts.sidebar")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">Ajouter un etudiant <a href="{{route("produits")}}" class="btn btn-secondary float-end">Retour</a></h3>
            <form action="{{ route('etudiant.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="" for="nom">Nom :</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" 
                        placeholder="Nom" value="{{ old('nom') }}"/>
                        @error('nom')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="nom">Prenom :</label>
                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" 
                         value="{{ old('prenom') }}" placeholder="prenom"/>
                        @error('prenom')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="email">Email :</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                         value="{{ old('email') }}"  placeholder="Email"/>
                        @error('email')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="tel">Tel :</label>
                    <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" 
                        placeholder="tel" value="{{ old('tel') }}"/>
                        @error('tel')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="date">Date u :</label>
                    <input type="date" class="form-control @error('date_u') is-invalid @enderror" name="date_u" 
                        placeholder="date_u" value="{{ old('date_u') }}"/>
                        @error('date_u')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="prix">Photo :</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" 
                        placeholder="photo" value="{{ old('photo') }}"  accept="image/png,image/jpeg"/>
                        @error('photo')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="id_ville">Ville :</label>
                    <select type="text" class="form-control @error('id_ville') is-invalid @enderror" name="id_ville" 
                        placeholder="Ville" value="{{ old('id_ville') }}">
                        @foreach ($villes as $ville)
                            <option value="{{$ville->id}}">{{$ville->nomVille}}</option>                            
                        @endforeach
                    </select>
                        @error('id_ville')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection