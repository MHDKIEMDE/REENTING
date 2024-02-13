

@extends('dashboard.admin.layout.app')

@section('title')
    Register - SB Admin
@endsection

@section('contents')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Listes de tous les maisons disponibles</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.adminHome') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">liste des maisons</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
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
                                            <h5>{{ number_format($maison->loyer, 0, '.', ' ') }} F CFA</h5>
                                        </div>
                                    </div>
                                    <p class="card-text"><strong>Type de maison :</strong> {{ $maison->type_maison }}</p>
                                    <p class="card-text"><strong>Quartier :</strong> {{ $maison->quartier }}</p>
                                    <ul class="d-flex" style="list-style: none">
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
                                        <div class="col "> <a href="{{ route('admin.editHouse', ['id' => $maison->id]) }}"
                                                class="btn btn-primary w-100">Modifier</a></div>
                                        <div class="col"> <a
                                                href="{{ route('admin.maisonsDetailes', ['maison' => $maison->id]) }}"
                                                class="btn btn-info w-100">Details</a></div>
                                        <div class="col">
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
                        <nav aria-label="Pagination">
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item {{ $maisons->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $maisons->previousPageUrl() }}" aria-label="Précédent">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $maisons->lastPage(); $i++)
                                    <li class="page-item {{ $maisons->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $maisons->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $maisons->currentPage() == $maisons->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $maisons->nextPageUrl() }}" aria-label="Suivant">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
