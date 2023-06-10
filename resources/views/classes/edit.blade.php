@extends("layouts.sidebar")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">Modifier un classe <a href="{{route("classes")}}" class="btn btn-secondary float-end">Retour</a></h3>
            <form action="{{ route('classe.update',$classe->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="" for="nomClasse">Nom de classe :</label>
                    <input type="text" class="form-control @error('nomClasse') is-invalid @enderror" name="nomClasse" 
                        placeholder="Nom de classe" value="{{ $classe->nomClasse }}"/>
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
                                @if($classe->belongsToEcole)
                                    <option value={{ $classe->belongsToEcole->id }} selected>{{ $classe->belongsToEcole->nom }}</option>
                                @else
                                    <option selected></option>
                                @endif    
                            @foreach($ecoles as $ecole)
                                    @if($classe->belongsToEcole->id != $ecole->id)
                                        <option value={{ $ecole->id }}>{{ $ecole->nom }}</option>
                                    @endif
                                    <option value={{ $ecole->id }}>{{ $ecole->nom }}</option>
                                @endforeach
                            @else
                                <option selected disabled>Merci d'ajouter une catégorie</option>
                            @endif
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection