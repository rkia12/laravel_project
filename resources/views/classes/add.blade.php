@extends("layouts.sidebar")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">Ajouter un classe <a href="{{route("classes")}}" class="btn btn-secondary float-end">Retour</a></h3>
            <form action="{{ route('classe.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="" for="nomClasse">Nom de classe :</label>
                    <input type="text" class="form-control @error('nomClasse') is-invalid @enderror" name="nomClasse" 
                        placeholder="Nom de classe" value="{{ old('nomClasse') }}"/>
                    @error('nomClasse')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="nom">ecole :</label>
                    <select class="form-control  @error('id_ecole') is-invalid @enderror"  name="id_ecole" value="{{ old('id_ecole') }}">
                        @if( !$ecoles->isEmpty())
                            @foreach($ecoles as $ecole)
                                <option value={{ $ecole->id }}>{{ $ecole->nom }}</option>
                            @endforeach
                        @else
                            <option selected disabled>Merci d'ajouter une ville</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection