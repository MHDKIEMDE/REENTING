@extends('layouts.app')

@section('contents')
    <h2>Résultats de la recherche</h2>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4 justify-content-center">
            @foreach ($maisons as $maison)
                <div class="col-md-4">
                    <div class="card h-100 border-0">
                        <img src="{{ asset('storage/' . $maison->image) }}"
                            class="card-img-top hover-zoom" alt="Image de la maison">
                        <div class="card-body border-0">
                            <h5 class="card-title">{{ $maison->nom }}</h5>
                            <p class="card-text">{{ $maison->quartier }}</p>
                            <p>{{ number_format($maison->loyer, 0, '.', ' ') }} F CFA</p>
                        </div>
                        <div class="card-footer text-center border-dark">
                            <a href="{{ route('maisons.detailes', ['maison' => $maison]) }}"
                                class="btn btn-info">Détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
