@extends('dashboard.admin.layout.app')

@section('title')
    Admin home
@endsection

@section('contents')
    <div class="container-fluid px-4">
        <h1 class="mt-4">ADMIN HOME</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.adminHome') }}">Dashboard</a></li>
            {{-- <li class="breadcrumb-item active">User liste</li> --}}
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <section class="suplement">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-2 col-12 d-flex" style="margin-left: 11%">
                                <div
                                    style="width: 3%;height: 60%;background-color: #1a1919; margin-top: 5px; "class="barre m-1">
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
                        <form id="formulaireFiltrage" action="{{ route('admin.filtrerMaisons') }}" method="post">
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
                                    <button type="button" class="btn btn-info w-100"
                                        onclick="filtrerMaison()">Filtrer</button>
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
                                            <p
                                                style="font-size: 35px;font-family: Roboto; font-weight: 700; line-height: 120%;">
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
                                                    <img src="{{ asset('storage/' . $maison->image) }}" class="card-img-top hover-zoom" alt="Image de la maison">
                                                    <div class="card-body border-0">
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="card-title">{{ $maison->ville }}</h6>
                                                            <h6 style="font-size: 15px">{{ number_format($maison->loyer, 0, '.', ' ') }} F CFA</h6>
                                                        </div>
                                                        <p class="card-text">{{ $maison->quartier }}</p>
                                                        <div class="d-flex me-3">
                                                            @foreach ($maison->options as $option)
                                                                @if ($option === 'douche')
                                                                    <p><i class="fas fa-shower p-1 me-2" data-toggle="tooltip" data-placement="top"
                                                                            title="Douche"></i>|</p>
                                                                @elseif ($option === 'garage')
                                                                    <p><i class="fas fa-car p-1 me-2" data-toggle="tooltip" data-placement="top"
                                                                            title="Garage"></i>|</p>
                                                                @elseif ($option === 'cuisine')
                                                                    <p><i class="fas fa-utensils p-1 me-2" data-toggle="tooltip" data-placement="top"
                                                                            title="Cuisine"></i>|</p>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <p class="card-text">
                                                            <!-- Bouton pour voir le profil de l'utilisateur -->
                                                            <button type="button" class="btn"
                                                                onclick="afficherProfil('{{ $maison->user->name }}', '{{ $maison->user->email }}')">
                                                                <i class="fa-solid fa-user me-1"></i>{{ $maison->user->name }}
                                                            </button>
                                                        </p>
                                                    </div>
                                                    <div class="card-footer text-center border-dark">
                                                        <a href="{{ route('admin.maisonsDetailes', ['maison' => $maison->id]) }}"
                                                            class="btn btn-light w-100 hover-zoom">Plus de détails</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                    <!-- Modale pour afficher les détails du profil de l'utilisateur -->
                                    <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="profilModalLabel">Détails du Profil</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Nom d'utilisateur:</strong> <span id="nomUtilisateur"></span></p>
                                                    <p><strong>Email:</strong> <span id="emailUtilisateur"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        function afficherProfil(nomUtilisateur, emailUtilisateur) {
                                            // Mettez à jour les éléments de la modale avec les informations de l'utilisateur
                                            document.getElementById('nomUtilisateur').textContent = nomUtilisateur;
                                            document.getElementById('emailUtilisateur').textContent = emailUtilisateur;
                                            // Affichez la modale
                                            $('#profilModal').modal('show');
                                        }
                                    </script>
                                    
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
                                                    <a class="page-link"
                                                        href="{{ $maisons->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li
                                                class="page-item {{ $maisons->currentPage() == $maisons->lastPage() ? 'disabled' : '' }}">
                                                <a class="page-link" href="{{ $maisons->nextPageUrl() }}"
                                                    aria-label="Suivant">
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
            </div>
        </div>
    </div>
@endsection