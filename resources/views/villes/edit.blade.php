@extends("layouts.sidebar")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">Modifier une ville <a href="{{route("villes")}}" class="btn btn-secondary float-end">Retour</a></h3>
            <form action="{{ route('ville.update',$ville->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="" for="nomVille">Nom de ville :</label>
                    <input type="text" class="form-control @error('nomVille') is-invalid @enderror" name="nomVille" 
                        placeholder="Nom de ville" value="{{ $ville->nomVille }}"/>
                        @error('nomVille')
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