@extends('dashboard.layouts.app')

@section('content')
    <form method="POST" action="{{ route('admin.updateHouse', ['id' => $maison->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Utilisez la méthode PUT pour les mises à jour -->
        <div class="mb-3">
            <label for="ville" class="form-label">Ville:</label>
            <input type="text" class="form-control" id="ville" value="{{ $maison->ville }}" name="ville" required
                placeholder="Ville">
        </div>
        <div class="mb-3">
            <label for="quartier" class="form-label">Quartier:</label>
            <input type="text" class="form-control" id="quartier" value="{{ $maison->quartier }}" name="quartier"
                required placeholder="Quartier">
        </div>
        <div class="mb-3">
            <label for="typeMaison" class="form-label">Type de maison:</label>
            <input type="text" class="form-control" id="typeMaison" value="{{ $maison->type_maison }}" name="typeMaison"
                required>
        </div>
        <div class="mb-3">
            <label for="nbChambres" class="form-label">Nombre de chambres:</label>
            <input type="number" class="form-control" id="nbChambres" value="{{ $maison->nb_chambres }}" name="nbChambres"
                required placeholder="Nombre de chambres">
        </div>
        <div class="mb-3">
            <label for="loyer" class="form-label">Loyer (mois):</label>
            <input type="text" class="form-control" id="loyer" value="{{ $maison->loyer }}" name="loyer" required
                placeholder="loyer">
        </div>
        <div class="mb-3 mt-5">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($maison->image)
                <img src="{{ asset('storage/' . $maison->image) }}" alt="Image de la maison" class="mt-2"
                    style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
