@extends('layouts.app')

@section('content')
    <section>
        <div class="row" style="margin-left: -2%; margin-right:-2%; ">
            <div class="col-md-12">
                <div id="carouselExampleSlidesOnly" class="carousel slide carousel-zoom" data-bs-ride="carousel"
                    data-bs-interval="5000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ URL::to('/') }}/images/bg11112.jpg" class="d-block w-100" alt="image d'accueil">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ URL::to('/') }}/images/bg4.jpg"class="d-block w-100" alt="image d'accueil">
                        </div>
                        <div class="carousel-item"><img src="{{ URL::to('/') }}/images/bg3.jpg" class="d-block w-100"
                                alt="image d'accueil">
                        </div>
                    </div>
                </div>
            </div>
            {{-- // cette section n'apparait sur les telephone mobile, elle apparait uniquement que sur les ordinateur' // --}}
            <div class="col-md-4 col-sm-6 d-flex align-items-center justify-content-center d-sm-none d-md-block">
                <div class="rectange-position-dessus  text-center">
                    <p style="font-size: 25px;line-height: 100%;">Trouvez votre foyer <br> idéal !</p>
                    <p style="font-size:16px ">"Notre objectif : une plateforme de mise en
                        relation <br> simplifiée entre
                        propriétaires et locataires <br> pour des maisons de charme. <br>
                        Une expérience fluide, vous
                        épargnant les démarches fastidieuses, afin de trouver rapidement votre foyer idéal pour
                        des
                        moments inoubliables."</p>
                    <a href="{{ route('home.aproposDeNous')}}"> <button type="button"
                            class="btn mt-1 text-dark fw-bold hover-zoom border rounded"
                            style="background-color: #F05510;">VOIR PLUS SUR NOUS!</button></a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center" style="height: 400px; background: #ff5100c9;">
                <div class="text-center">
                    <p class=""
                        style="
             color: #FFF;
        margin-top:-9%;
        font-family: Roboto;
        font-size: 45px;
        font-style: normal;
        font-weight: 700;
        line-height: 100%;">
                        "Énigme de Résidences <br>
                        Enchantées"</p>
                    <div class="container ">
                        <p
                            style="
        color: #FFF;
        text-align: center;
        font-family: Roboto;
        font-size: 27px;
        font-style: normal;
        font-weight: 400;
        line-height: 130%;">
                            "Parcourez notre sélection de maisons disponibles et embarquez pour <br> l'exploration
                            de votre futur chez-vous idéal, imprégné de charme et <br> d'authenticité."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container" style=" margin-top:-10%;">
            <div class="row row-cols-1 row-cols-md-3  justify-content-around">
                <div class="col-md-4">
                    <div class="card border-0">
                        <img src="{{ URL::to('/') }}/images/5.jpg" class="card-img-top" alt="...">
                        <div class="card-footer text-center border-dark">
                            <a href="#"> <button type="button" class="btn btn-light w-100 hover-zoom">Plus
                                    de
                                    detailes</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0">
                        <img src="{{ URL::to('/') }}/images/4.jpg" class="card-img-top" alt="...">
                        <div class="card-footer text-center border-dark">
                            <a href="#"> <button type="button" class="btn btn-light w-100 hover-zoom">Plus
                                    de
                                    detailes</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0">
                        <img src="{{ URL::to('/') }}/images/7.jpg" class="card-img-top " alt="...">
                        <div class="card-footer text-center border-dark">
                            <a href="#"> <button type="button" class="btn btn-light w-100 hover-zoom">Plus
                                    de
                                    detailes</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="suplement">
        <div class="container ">
            <div class="row">
                <div class="col-md-2 col-12 d-flex mt-5" style="margin-left: 11%">
                    <div style="width: 3%;height: 60%;background-color: #1a1919; margin-top: 5px; "class="barre m-1">
                    </div>
                    <div>
                        <p class="">OU DESIRERIEZ VOUS VIVRE ?</p>
                    </div>
                </div>
                <div class="col-md-2  mt-5 fw-bold" style="margin-left: 44%;">
                    <a href="#"> <button type="button" class="btn btn-dark w-100 ">LOCATIONS</button></a>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container mb-4">
            <form id="formulaireFiltrage" action="{{URL::to('/home/filtrer') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-3 col-10 text-center m-2">
                        <select class="form-select form-control" name="ville" aria-label="Ville">
                            <option value="" selected>Toutes les villes</option>
                            <option value="Ouagadougou">Ouagadougou</option>
                            <option value="Bobo">Bobo</option>
                            <option value="Koudougou">Koudougou</option>
                            <option value="dori">dori</option>
                            <option value="po">po</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-10 text-center m-2">
                        <select class="form-select form-control" name="quartier" aria-label="Quartier">
                            <option value="" selected>Tous les quartiers</option>
                            <option value="ouaga 2000">Ouaga_2000</option>
                            <option value="1200 logements">1200_logements</option>
                            <option value="Karpala">Karpala</option>
                            <option value="Pissy">Pissy</option>
                            <option value="Pissy">katre yare</option>
                            <option value="Tampouy">Tampouy</option>
                            <option value="CiteAzimmo">Cité Azimmo Ouaga 2000</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-10 text-center m-2">
                        <select class="form-select form-control" name="type_maison" aria-label="Type de maison">
                            <option value="" selected>Tous les types</option>
                            <option value="entrer_coucher">Entrer_Coucher</option>
                            <option value="1_pieces">Chambre salon</option>
                            <option value="2_pieces">(2) Chambre salon</option>
                            <option value="3_pieces">(3) Chambre salon</option>
                            <option value="4_pieces">(4) Chambre salon</option>
                            <option value="5_pieces">(5) Chambre salon</option>
                            <option value="6_pieces">(6) Chambre salon</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3 col-10 text-center m-2">
                        <select class="form-select form-control" name="loyer" aria-label="Loyer par mois">
                            <option value="" selected>Loyer par mois</option>
                            <option value="0-20000">Moins de 20 000 F CFA</option>
                            <option value="20000-30000">20 000 - 30 000 F CFA</option>
                            <option value="30000-45000">30 000 - 45 000 F CFA</option>
                            <option value="45000-60000">45 000 - 60 000 F CFA</option>
                            <option value="60000-80000">60 000 - 80 000 F CFA</option>
                            <option value="plus de 80000">Plus de - 80 000 F CFA</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-10 text-center m-2">
                        <select class="form-select form-control" name="cautions" aria-label="Loyer par mois">
                            <option value="" selected>Cautions (CONDITION !)</option>
                            <option value="1m_1c">1 mois de loyer 1 mois de caution</option>
                            <option value="1m_2c">1 mois de loyer 2 mois de caution</option>
                            <option value="1m_3c">1 mois de loyer 3 mois de caution</option>
                            <option value="2m_1c">2 mois de loyer 1 mois de caution</option>
                            <option value="2m_2c">2 mois de loyer 2 mois de caution</option>
                            <option value="2m_3c">2 mois de loyer 3 mois de caution</option>
                            <option value="3m_1c">3 mois de loyer 1 mois de caution</option>
                            <option value="3m_2c">3 mois de loyer 2 mois de caution</option>
                            <option value="3m_3c">3 mois de loyer 3 mois de caution</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-10 text-center m-2">
                        <button type="button" class="btn btn-info w-100" onclick="filtrerMaison()">Filtrer</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="mt-5" id="maison">
        <div class="container-fluid">
            <div class="row bg-body-tertiary text-dark ">
                <section class="premiere-section">
                    <div class="container">
                        <div class="row mt-4">
                            <div class="col-md-5 col-sm-12">
                                <p style="font-size: 35px;font-family: Roboto; font-weight: 700; line-height: 120%;">
                                    Explorez notre sélection <br>
                                    variée de <br>
                                    maisons disponibles.</p>
                            </div>
                            <div class="col-md-2 d-none d-sm-block" style="margin-left: 41%; margin-top:7%">
                                <button type="button" class="btn btn-info w-100 hover-zoom"
                                    style="background-color: #55a407">Voir plus</button>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4 justify-content-center">
                            @foreach ($maisons as $maison)
                                <div class="col-md-3">
                                    <div class="card h-100 border-0">
                                        <img src="{{ asset('storage/' . $maison->image) }}"
                                            class="card-img-top hover-zoom" alt="Image de la maison">
                                        <div class="card-body border-0">
                                            <div class="">
                                                <h5 class="card-title">{{ $maison->ville }}</h5>
                                                <h5>{{ number_format($maison->loyer, 0, '.', ' ') }} F CFA</h5>
                                            </div>
                                            <p class="card-text">{{ $maison->quartier }}</p>
                                            <div class="d-flex me-3">
                                                @foreach ($maison->options as $option)
                                                    @if ($option === 'douche')
                                                        <p><i class="fas fa-shower p-1 me-2" data-toggle="tooltip"
                                                                data-placement="top" title="Douche"></i>|</p>
                                                    @elseif ($option === 'garage')
                                                        <p><i class="fas fa-car p-1 me-2" data-toggle="tooltip"
                                                                data-placement="top" title="Garage"></i>|</p>
                                                    @elseif ($option === 'cuisine')
                                                        <p><i class="fas fa-utensils p-1 me-2" data-toggle="tooltip"
                                                                data-placement="top" title="Cuisine"></i>|</p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card-footer text-center border-dark">
                                            <a href="{{ route('home.maisonsDetailes', ['maison' => $maison->id]) }}"
                                                class="btn btn-light w-100 hover-zoom">Plus de détails</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Pagination Bootstrap avec pagination-sm -->
                        <nav aria-label="Pagination">
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item {{ $maisons->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $maisons->previousPageUrl() }}"
                                        aria-label="Précédent">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $maisons->lastPage(); $i++)
                                    <li class="page-item {{ $maisons->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $maisons->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li
                                    class="page-item {{ $maisons->currentPage() == $maisons->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $maisons->nextPageUrl() }}" aria-label="Suivant">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function filtrerMaison() {
            // Sélectionnez le formulaire
            var formulaire = $('#formulaireFiltrage');

            // Effectuez la requête AJAX
            $.ajax({
                type: formulaire.attr('method'),
                url: formulaire.attr('action'),
                data: formulaire.serialize(), // Sérialisez les données du formulaire
                success: function(response) {
                    // Mettez à jour la section des résultats avec la réponse du serveur
                    $('#resultatsFiltrage').html(response);
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            // Stocke la valeur de l'élément sélectionné
            const selects = document.querySelectorAll('select');
            selects.forEach(select => {
                select.addEventListener('change', function() {
                    // Stocke la valeur de l'élément sélectionné dans le stockage local (localStorage)
                    localStorage.setItem('selectedValue', this.value);
                    // Soumet le formulaire

                });
            });

            // Vérifie s'il y a une valeur stockée dans le stockage local
            const selectedValue = localStorage.getItem('selectedValue');
            if (selectedValue) {
                // Réinsère la valeur stockée dans le menu déroulant
                selects.forEach(select => {
                    select.value = selectedValue;
                });
            }
        });
    </script>
    <script>
        // Fonction pour soumettre le formulaire de filtrage
        function filtrerMaison() {
            document.getElementById('formulaireFiltrage').submit();
        }
        // Ajoutez un écouteur d'événements de changement aux menus déroulants
        const selects = document.querySelectorAll('select');
        selects.forEach(select => {
            select.addEventListener('change', filtrerMaison);
        });
    </script>
@endsection
