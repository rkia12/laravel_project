@extends("layouts.sidebar")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">produit un produit <a href="{{route("produits")}}" class="btn btn-secondary float-end">Retour</a></h3>
            <form action="{{ route('produit.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="" for="nom">Nom de produit :</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" 
                        placeholder="Nom de produit" value="{{ old('nom') }}"/>
                        @error('nom')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="description">Description :</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" 
                         >{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="prix">Prix :</label>
                    <input type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" 
                        placeholder="prix" value="{{ old('prix') }}"/>
                        @error('prix')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="photo">Photo :</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" 
                        placeholder="photo" accept="image/png,image/jpeg"/>
                        @error('photo')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="size">Size :</label>
                    <input type="text" class="form-control @error('size') is-invalid @enderror" name="size" 
                        placeholder="size" value="{{ old('size') }}"/>
                        @error('size')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="couleur">Couleur :</label>
                    <input type="text" class="form-control @error('couleur') is-invalid @enderror" name="couleur" 
                        placeholder="couleur" value="{{ old('couleur') }}"/>
                        @error('couleur')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="quantite">Quantite :</label>
                    <input type="text" class="form-control @error('quantite') is-invalid @enderror" name="quantite" 
                        placeholder="quantite" value="{{ old('quantite') }}"/>
                        @error('quantite')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="id_categorie">Categorie :</label>
                    <select class="form-control  @error('id_categorie') is-invalid @enderror"  name="id_categorie" value="{{ old('id_categorie') }}">
                        @if( !$categories->isEmpty())
                            @foreach($categories as $categorie)
                                <option value={{ $categorie->id }}>{{ $categorie->nom }}</option>
                            @endforeach
                        @else
                            <option selected disabled>Merci d'ajouter une catégorie</option>
                        @endif
                    </select>
                        @error('id_categorie')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div> 
                <div class="mb-3">
                    <label class="" for="id_pack">Pack :</label>
                    <select class="form-control  @error('id_pack') is-invalid @enderror"  name="id_pack" value="{{ old('id_pack') }}">
                        @if( !$packs->isEmpty())
                            @foreach($packs as $pack)
                                <option value={{ $pack->id }}>{{ $pack->type }}</option>
                            @endforeach
                        @else
                            <option selected disabled>Merci d'ajouter une catégorie</option>
                        @endif
                    </select>
                        @error('id_pack')
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