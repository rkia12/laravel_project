@extends("layouts.sidebar")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">Modifier categorie <a href="{{route("categories")}}" class="btn btn-secondary float-end">Retour</a></h3>
            <form action="{{ route('category.update',$categorie->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="" for="nom">Nom Categorie :</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" 
                        placeholder="Nom categorie" value="{{ $categorie->nom }}"/>
                    @error('nom')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="nom">Categorie parent :</label>
                    <select class="form-control  @error('id_categorieParent') is-invalid @enderror"  name="id_categorieParent" value="{{ old('id_categorieParent') }}">
                        @if( !$categories->isEmpty())
                            @if($categorie->belongsToCategorie)
                                <option value={{ $categorie->belongsToCategorie->id }} selected>{{ $categorie->belongsToCategorie->nom }}</option>
                            @else
                            <option selected></option>
                            @endif    
                        @foreach($categories as $_categorie)
                                @if($categorie->belongsToCategorie && $categorie->belongsToCategorie->id != $_categorie->id)
                                    <option value={{ $_categorie->id }}>{{ $_categorie->nom }}</option>
                                @endif
                                <option value={{ $_categorie->id }}>{{ $_categorie->nom }}</option>
                            @endforeach
                        @else
                            <option selected disabled>Merci d'ajouter une catégorie</option>
                        @endif
                    </select>
                    @error('id_categorieParent')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="nom">matiere :</label>
                    <select class="form-control  @error('id_matiere') is-invalid @enderror" name="id_matiere" value="{{ old('id_matiere') }}">
                        @if( !$matieres->isEmpty())
                        @foreach($matieres as $matiere)
                            <option value={{ $matiere->id }}>{{ $matiere->nom_matiere }}</option>
                        @endforeach
                    @else
                        <option selected disabled>Merci d'ajouter une matiere</option>
                    @endif
                    </select>
                    @error('id_matiere')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection