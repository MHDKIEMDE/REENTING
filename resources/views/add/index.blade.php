@extends('layouts.app')

@section('content')
    @foreach ($maisons as $maison)
        <div class="col-md-3">
            <div class="card h-100 border-0">
                <img src="{{ asset('storage/' . $maison->image) }}" class="card-img-top hover-zoom" alt="Image de la maison">
                <div class="card-body border-0">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{ $maison->nom }}</h5>
                        <h5>{{ number_format($maison->loyer, 0, '.', ' ') }} F CFA</h5>
                    </div>
                    <p class="card-text">{{ $maison->quartier }}</p>
                    <div class="d-flex me-3">
                        <p><i class="fas fa-bed p-1"></i>: {{ $maison->nb_chambres }} |</p>
                        @foreach ($maison->options as $option)
                            @if ($option === 'douche')
                                <p><i class="fas fa-shower p-1 me-2"></i>|</p>
                            @elseif ($option === 'garage')
                                <p><i class="fas fa-car p-1 me-2"></i>|</p>
                            @elseif ($option === 'cuisine')
                                <p><i class="fas fa-utensils p-1 me-2"></i>|</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="card-footer text-center border-dark">
                    <a href="{{ route('maisons.detailes', ['maison' => $maison->id]) }}"
                        class="btn btn-light w-100 hover-zoom">Plus de détails</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
