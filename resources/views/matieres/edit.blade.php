@extends("layouts.sidebar")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">Modifier une Matiere <a href="{{route("matieres")}}" class="btn btn-secondary float-end">Retour</a></h3>
            <form action="{{ route('matiere.update',$matiere->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="" for="nom">Nom Matiere :</label>
                    <input type="text" class="form-control @error('nom_matiere') is-invalid @enderror" name="nom_matiere" 
                        placeholder="Nom Matiere" value="{{ $matiere->nom_matiere }}"/>
                    @error('nom_matiere')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="nom">Fichier scol :</label>
                    <input type="text" class="form-control @error('fichier_scol') is-invalid @enderror" name="fichier_scol" 
                        placeholder="Fichier scol" value="{{ $matiere->fichier_scol }}"/>
                         @error('fichier_scol')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="nom">classe :</label>
                    <select class="form-control  @error('id_classe') is-invalid @enderror"  name="id_classe" value="{{ old('id_classe') }}">
                        @foreach($classes as $classe)
                                <option value={{ $classe->id }}>{{ $classe->nomClasse }}</option>
                        @endforeach
                            @if( !$classes->isEmpty())
                                @if($matiere->belongsToClasse)
                                    <option value={{ $matiere->belongsToClasse->id }} selected>{{ $matiere->belongsToClasse->nomClasse }}</option>
                                @else
                                    <option selected></option>
                                @endif    
                            @foreach($classes as $classe)
                                    @if($matiere->belongsToClasse && $matiere->belongsToClasse->id != $classe->id)
                                        <option value={{ $classe->id }}>{{ $classe->nomClasse }}</option>
                                    @endif
                                    <option value={{ $classe->id }}>{{ $classe->nomClasse }}</option>
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