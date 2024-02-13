@extends('layouts.app')

@section('contents')
<h2>Maisons à {{ $ville }}</h2>
<section class="second-section mt-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4 justify-content-center">
            @foreach ($maisons as $maison)
                <div class="col-md-3">
                    <div class="card h-100 border-0">
                        <img src="{{ asset('storage/' . $maison->image) }}"
                            class="card-img-top hover-zoom" alt="Image de la maison">
                        <div class="card-body border-0">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ $maison->nom }}</h5>
                                <h5>{{ number_format($maison->loyer, 0, '.', ' ') }} F CFA</h5>
                            </div>
                            <p class="card-text">{{ $maison->quartier }}</p>
                            <div class="d-flex me-3">
                               
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


                            <a href="{{ route('maisons.show', ['maison' => $maison]) }}"><button
                                    type="button" class="btn btn-info hover-zoom">
                                    détaile</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
