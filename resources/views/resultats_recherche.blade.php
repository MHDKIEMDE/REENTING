@extends('layouts.app')

@section('contents')
<h2>Résultats de la recherche pour la ville {{ $ville }}</h2>
<section class="second-section mt-5">
    <div class="container">
        <section>

        </section>
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
                            <form action="{{ route('maisons.supprimer', $maison) }}"
                                method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-danger hover-zoom">Supps</button>
                            </form>
                            <a href="{{ route('maisons.modifier', $maison) }}"
                                class="btn btn-secondary hover-zoom">Modifs</a>
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



    @extends('layouts.app')

@section('contents')
    <h2>Rechercher des Maisons</h2>
    <form action="{{ route('maisons.rechercher') }}" method="GET">
        <div class="container mb-4">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <select name="ville" class="form-select gap-2" aria-label="Sélectionner une ville">
                        <option value="">Ville</option>
                        <option value="Ouagadougou">Ouagadougou</option>
                        <option value="Bobo">Bobo</option>
                        <option value="Koudougou">Koudougou</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="type_maison" class="form-select" aria-label="Sélectionner un type de maison">
                        <option value="">Type de maison</option>
                        <option value="1">Une (1) pièce</option>
                        <option value="2">Deux (2) pièces</option>
                        <option value="3">Trois (3) pièces</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="quartier" class="form-select" aria-label="Sélectionner un quartier">
                        <option value="">Quartier</option>
                        <option value="Ouaga 2000">Ouaga 2000</option>
                        <option value="1200 logements">1200 logements</option>
                        <option value="Karpala">Karpala</option>
                        <option value="Pissy">Pissy</option>
                        <option value="Tampouy">Tampouy</option>
                        <option value="Cité Azimmo Ouaga 2000">Cité Azimmo Ouaga 2000</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="container mb-4">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <select name="nb_chambres" class="form-select" aria-label="Sélectionner le nombre de chambres">
                        <option value="">Nombre de chambres</option>
                        <option value="1">Une (1) chambre</option>
                        <option value="2">Deux (2) chambres</option>
                        <option value="3">Trois (3) chambres</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="options" class="form-select" aria-label="Sélectionner des options">
                        <option value="">Options</option>
                        <option value="douche">Douche</option>
                        <option value="garage">Garage</option>
                        <option value="cuisine">Cuisine</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success w-100">Rechercher</button>
                </div>
            </div>
        </div>
    </form>

    @if (count($maisons) > 0)
    <h3>Résultats de la recherche</h3>
    <section class="second-section mt-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4 justify-content-center">
                @foreach ($maisons as $maison)
                    <div class="col-md-3">
                        <!-- ... Affichage des détails de la maison ... -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    <p>Aucune maison ne correspond à vos critères de recherche.</p>
    @endif
@endsection

