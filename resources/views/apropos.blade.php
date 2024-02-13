@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">À Propos de [ Home Reenting]</h1>
        <p class="lead">Bienvenue sur [ Home Reenting], la destination en ligne pour faciliter la recherche de
            maisons en location et la mise en relation entre locataires et bailleurs.</p>
    </div>

    <div class="row mb-5">
        <div class="col-md-6">
            <img src="{{URL::to('/')}}/images/KIEMDE.jpg" alt="Image du fondateur" class="img-fluid mb-3">
        </div>
        <div class="col-md-6">
            <h2>Notre Histoire</h2>
            <p>Fondé par des experts passionnés d'immobilier et de technologie, [ Home Reenting] a émergé de notre
                désir de...</p>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-6">
            <img src="{{URL::to('/')}}/images/apropos.jpg" alt="Image de la mission" class="img-fluid mb-3">
        </div>
        <div class="col-md-6">
            <h2>Notre Mission et Objectifs</h2>
            <p>Notre mission est claire : réinventer la location de maisons en offrant une expérience sans friction...
            </p>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-6">
            <h2>Nos Principes et Valeurs</h2>
            <ul>
                <li>Transparence</li>
                <li>Confiance</li>
                <li>Collaboration</li>
            </ul>
        </div>
        <div class="col-md-6">
            <img src="values_image.jpg" alt="Image des valeurs" class="img-fluid mb-3">
        </div>
    </div>

    {{-- <div class="row mb-5">
        <div class="col-md-6">
            <img src="team_image.jpg" alt="Image de l'équipe" class="img-fluid mb-3">
        </div>
        <div class="col-md-6">
            <h2>Notre Équipe</h2>
            <p>Notre équipe est composée d'experts en immobilier, en design et en développement...</p>
        </div>
    </div> --}}

    <div class="row mb-5">
        <div class="col-md-6">
            <h2>Témoignages</h2>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">"Grâce à [ Home Reenting], j'ai trouvé la maison en quelques
                        clics. L'expérience a été incroyablement facile et rapide."</p>
                    <p class="card-text"><small class="text-muted">- Témoignage de Client</small></p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <p class="card-text">"En tant que bailleur, [ Home Reenting] m'a permis de trouver des locataires
                         en un temps record. Je ne pourrais pas être plus satisfait."</p>
                    <p class="card-text"><small class="text-muted">- Témoignage de Bailleur</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Contactez-Nous</h2>
            <p>Si vous avez des questions, des suggestions ou simplement envie de discuter, nous sommes à un clic de
                distance <a class="nav-link" href="{{ route('dema.contact') }}"></a></p>
            <img src="contact_image.jpg" alt="Image de contact" class="img-fluid mt-3">
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12 text-center">
            <h2>Rejoignez-Nous dans Cette Aventure</h2>
            <img src="join_us_image.jpg" alt="Image inspirante de maison" class="img-fluid mt-3">
        </div>
    </div>

</div>
@endsection


{{-- <section>
    @extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Ajouter une maison</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('maisons.ajout') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la maison:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse:</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <div class="mb-3">
                <label for="nbChambres" class="form-label">Nombre de chambres:</label>
                <input type="number" class="form-control" id="nbChambres" name="nbChambres" required>
            </div>
            <div class="mb-3">
                <label for="typeMaison" class="form-label">Type de maison:</label>
                <input type="text" class="form-control" id="typeMaison" name="typeMaison" required>
            </div>
            <div class="mb-3">
                <label for="quartier" class="form-label">Quartier:</label>
                <input type="text" class="form-control" id="quartier" name="quartier" required>
            </div>
            <div class="mb-3">
                <label>Options :</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="douche" name="options[]" value="douche">
                    <label class="form-check-label" for="douche">Douche</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="garage" name="options[]" value="garage">
                    <label class="form-check-label" for="garage">Garage</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="cuisine" name="options[]" value="cuisine">
                    <label class="form-check-label" for="cuisine">Cuisine</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        @if ($maisons)
            <div class="row">
                @foreach ($maisons as $maison)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border">
                            <img src="{{ asset('storage/maison_images/' . $maison->image) }}"
                                class="card-img-top hover-zoom" alt="Image de la maison">
                            <div class="card-body border">
                                <h5 class="card-title">{{ $maison->nom }}</h5>
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
                                <a href="#"><button type="button" class="btn btn-light w-100 hover-zoom">Plus
                                        de
                                        détails</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

</section> --}}
