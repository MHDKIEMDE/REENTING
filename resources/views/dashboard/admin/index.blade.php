@extends('dashboard.admin.layout.app')

@section('title')
    Register - SB Admin
@endsection

@section('contents')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Listes de tous les utilisateur</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.adminHome') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">User liste</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <div class="col-md-8">
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
                    <form method="POST" action="{{ route('admin.storeHouse') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Champ Ville -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="ville" class="form-label">Ville:</label>
                                    <input type="text" class="form-control" id="ville" name="ville" required>
                                </div>
                            </div>
                            <!-- Champ Quartier -->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="quartier" class="form-label">Quartier:</label>
                                    <input type="text" class="form-control" id="quartier" name="quartier" required>
                                </div>
                            </div>
                            <!-- Champ Type de maison (Sélection) -->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="typeMaison" class="form-label">Type de maison:</label>
                                    <select class="form-select" id="typeMaison" name="typeMaison" required>
                                        <option value="" disabled selected>Choisir le type
                                        </option>
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

                            <!-- Champ loyer -->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="loyer" class="form-label">Loyer (mois):</label>
                                    <input type="text" class="form-control" id="loyer" name="loyer" required>
                                </div>
                            </div>

                            <!-- Champ Image -->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image:</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <!-- Champs dynamiques pour les options (Douche, Garage, Cuisine) -->
                            <div class="col-md-8">
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
                            <div class="col-md-8">
                                <div class="mb-3 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="eau" name="options[]"
                                            value="eau">
                                        <label class="form-check-label" for="eau">L'eau</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Courant"
                                            name="options[]" value="Courant">
                                        <label class="form-check-label" for="Courant">Courant</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Ventiler"
                                            name="options[]" value="Ventiler">
                                        <label class="form-check-label" for="Ventiler">Ventiler</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-around">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection