@extends("layouts.sidebar")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">Ajouter une ecole <a href="{{route("ecoles")}}" class="btn btn-secondary float-end">Retour</a></h3>
            <form action="{{ route('ecole.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="" for="nom">Nom de l'ecole :</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" 
                        placeholder="Nom de l'ecole" value="{{ old('nom') }}"/>
                    @error('nom')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="nom">Ville :</label>
                    <select class="form-control  @error('id_ville') is-invalid @enderror"  name="id_ville" value="{{ old('id_ville') }}">
                        @if( !$villes->isEmpty())
                            @foreach($villes as $ville)
                                <option value={{ $ville->id }}>{{ $ville->nomVille }}</option>
                            @endforeach
                        @else
                            <option selected disabled>Merci d'ajouter une ville</option>
                        @endif
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