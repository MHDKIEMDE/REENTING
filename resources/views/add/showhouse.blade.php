`

@extends('layouts.app')

@section('content')
    <!-- Votre en-tête de navigation ou d'autres éléments communs ici -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $maison->image) }}" class="card-img-top hover-zoom" alt="Image de la maison">
            </div>
            <div class="col-md-6">
                <h2>{{ $maison->nom }}</h2>
                <p><strong>Catégorie :</strong> Maison Individuelle</p>
                <p class="d-flex bg-danger"><strong>Loyer :{{ $maison->loyer }}</strong>F par mois</p>
                <p><strong>Emplacement :</strong> Quartier XYZ</p>
                <ul>
                    @foreach ($maison->options as $option)
                        @if ($option === 'douche')
                            <li><i class="fas fa-shower me-2"></i>Douche</li>
                        @elseif ($option === 'garage')
                            <li><i class="fas fa-car  me-2"></i>Garage</li>
                        @elseif ($option === 'cuisine')
                            <li><i class="fas fa-utensils  me-2"></i>Cuisine</li>
                        @endif
                    @endforeach
                </ul>
                <a href="{{ URL::to('/authentification/login') }}" class="btn btn-primary b">Réserver</a>
            </div>
        </div>
        <!-- Carrousel pour montrer les aspects de la maison -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Aspects de la Maison</h3>
                <!-- ... Carrousel d'aspects ... -->
            </div>
        </div>
        <!-- Section pour le contact direct -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Contact Direct</h3>
                <p>Pour plus d'informations ou pour planifier une visite, appelez-nous au : <strong>+123456789</strong>
                </p>
            </div>
        </div>
    </div>
@endsection
