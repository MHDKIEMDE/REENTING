@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row m-5 justify-content-center">
            <div class="col-md-4">
                <a href="{{ route('admin.createHouse') }}" class="btn btn-info">Ajouter une maison</a>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($maisons as $maison)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $maison->image) }}" class="card-img-top hover-zoom"
                            alt="Image de la maison">
                        <div class="card-body">
                            <div class="row d-flex">
                                <div class="col-md-6">
                                    <h5 class="card-title">{{ $maison->ville }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-text">{{ $maison->loyer }} F mois</h5>
                                </div>
                            </div>
                            <p class="card-text"><strong>Type de maison :</strong> {{ $maison->type_maison }}</p>
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
                            <div class="row ">
                                <div class="col-md-6 "> <a href="{{ route('admin.editHouse', ['id' => $maison->id]) }}"
                                        class="btn btn-primary w-100">Modifier</a></div>
                                <div class="col-md-6">
                                    <form action="{{ route('admin.deleteHouse', ['id' => $maison->id]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette maison ?')">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                {{ $maisons->links() }}
            </div>
        </div>
    </div>
@endsection
