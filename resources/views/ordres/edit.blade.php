@extends("layouts.sidebar")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 bg-white shadow rounded p-5 table-responsive">
            <h3 class="mb-3 fs-4">Modifier Status de Commande <a href="{{route("ordres")}}" class="btn btn-secondary float-end">Retour</a></h3>
            <form action="{{ route('ordre.update',$ordere->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="" for="nomVille">Status :</label>
                    <select class="form-control  @error('status') is-invalid @enderror"  name="status" value="{{ old('status') }}">
                        <option value={{ $ordere->status}} selected>{{ $ordere->status }}</option>
                        @foreach($statusList as $_status)
                            @if( $ordere->status != $_status)
                                <option value={{ $_status}}>{{ $_status }}</option>
                            @endif
                        @endforeach
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