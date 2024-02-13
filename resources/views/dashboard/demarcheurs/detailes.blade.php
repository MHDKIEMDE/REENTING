@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $maison->image) }}" class="card-img-top hover-zoom" alt="Image de la maison">
            </div>
            <div class="col-md-6">
                <h2>{{ $maison->nom }}</h2>
                <p class="card-text"><strong>Type de maison :</strong> {{ $maison->type_maison }}</p>
                <p class="d-flex"><strong>Loyer : {{ number_format($maison->loyer, 0, ',', ' ') }}</strong> F par mois</p>
                <p class="card-text"><strong>Quartier :</strong> {{ $maison->quartier }}</p>
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
                <p class="card-text"><strong>Cautions :</strong> {{ $maison->cautions }}</p>
                 <a href="www.whatssap.com" class="btn btn-primary b">(+226) 07443112</a>
                <a href="" class="btn btn-primary b">Contact  whatasapp</a>
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
            <div class="
@endsection
