@extends('layouts.app')

@section('content')
    <div class="row justify-content-center m-3">
        <div class="col-md-6">
            <h1 class="my-4">Ajouter votre maison</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('maisons.ajouter') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Utilisez la méthode PUT pour les mises à jour -->
                <!-- Champ Ville -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville:</label>
                            <input type="text" class="form-control" id="ville" name="ville" required>
                        </div>
                    </div>
                    <!-- Champ Quartier -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="quartier" class="form-label">Quartier:</label>
                            <input type="text" class="form-control" id="quartier" name="quartier" required>
                        </div>
                    </div>
                    <!-- Champ Type de maison (Sélection) -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="typeMaison" class="form-label">Type de maison:</label>
                            <select class="form-select" id="typeMaison" name="typeMaison" required>
                                <option value="" disabled selected>Choisir le type</option>
                                <option value="entrer_coucher">Entrer_Coucher</option>
                                <option value="2_pieces">Chambre salon</option>
                                <option value="3_pieces">(2) Chambre salon</option>
                                <option value="3_pieces">(3) Chambre salon</option>
                                <option value="2_pieces">(4) Chambre salon</option>
                                <option value="3_pieces">(5) Chambre salon</option>
                                <option value="3_pieces">(6) Chambre salon</option>
                            </select>
                        </div>
                    </div>
                    <!-- Champ Nombre de chambres -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="nbChambres" class="form-label">Nombre de chambres:</label>
                            <input type="number" class="form-control" id="nbChambres" name="nbChambres" required>
                        </div>
                    </div>
                    <!-- Champ loyer -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="loyer" class="form-label">loyer:</label>
                            <input type="text" class="form-control" id="loyer" name="loyer" required>
                        </div>
                    </div>
                    <!-- Champ Image -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if ($maison->image)
                                <img src="{{ asset('storage/' . $maison->image) }}" alt="Image de la maison" class="mt-2"
                                    style="max-width: 200px;">
                            @endif
                        </div>
                    </div>
                    <!-- Champs dynamiques pour les options (Douche, Garage, Cuisine) -->
                    <div class="col-md-5">
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="douche" name="options[]"
                                    value="douche">
                                <label class="form-check-label" for="douche">Douche</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="garage" name="options[]"
                                    value="garage">
                                <label class="form-check-label" for="garage">Garage</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cuisine" name="options[]"
                                    value="cuisine">
                                <label class="form-check-label" for="cuisine">Cuisine</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-primary w-50">Valider</button>
                        </div>
                       
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
