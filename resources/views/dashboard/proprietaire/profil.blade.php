@extends('dashboard.layouts.app')

@section('content')
    <!-- End of Navbar -->
    <div class="container-fluid bg-bleu p-md-5">
        <div class="sectionTitle fw-bold h1 text-blanc mb-5 mt-5"></div>

        <div class="container bg-blanc p-5">
            <div class="row">
                <div class="col-12 d-md-none">
                    @if ( $user->profile_image)
                        <!-- Si l'entreprise a une image, affichez-le -->
                        <img src="{{ asset('storage/' . $user->profile_image) }}" class="w-100 img-fluid"
                            style="object-fit: cover; height: 300px" />
                    @else
                        <!-- Si l'entreprise n'a pas de logo, affichez l'image par défaut -->
                        <div> <img src="{{ asset('assets/images/0101.jpg') }}" class="w-100 img-fluid"
                                style="object-fit: cover; height: 300px" /></div>
                    @endif
                </div>
                <div class="col-md-8 d-md-none">
                    <div class="col-12">
                        <h1 class="flamaSemiBold text-capitalize firstNameTitleMobile">{{ $user->last_name }}</h1>
                        <h1 class="flamaBold text-uppercase nameTitleMobile">{{ $user->name }}</h1>
                    </div>
                    <div class="col-12 mt-md-4">
                        <div>
                            {{-- <h3><span class="text-capitalize">{{ }}</span></h3> --}}
                            <h3>{{ $user->phone_number }}
                            </h3>

                            <h3>{{ $user->secondary_phone_number }}</h3>
                            <h3>{{ $user->email }}</h3>
                            <h3><span class="text-capitalize">{{ $user->address }}</span></h3>
                        </div>
                    </div>
                    <div class="col-12 d-none d-md-block" style="margin-top:39px ">
                        <h1 class="bg-bleu text-blanc text-center p-3 text-uppercase flamaBold fs-1">
                            {{ $user->quarter }}
                        </h1>
                    </div>
                </div>
                <div class="col-md-8 d-none d-md-block">
                    <div class="col-12">
                        <h1 class="flamaSemiBold text-capitalize firstNameTitle">{{ $user->last_name }}</h1>
                        <h1 class="flamaBold text-uppercase nameTitle">{{ $user->name }}</h1>
                    </div>
                    <div class="col-12 mt-md-4">
                        <div>
                            <h3><span class="flamaBold text-uppercase">Numéro de tel : </span>{{ $user->phone_number }}
                            </h3>
                            <h3><span class="flamaBold text-uppercase"> 2e Numéro de tel :
                                </span>{{ $user->secondary_phone_number }}
                            </h3>
                            <h3><span class="flamaBold text-uppercase">Email : </span>{{ $user->email }}</h3>
                            <h3 class="text-capitalize"><span class="flamaBold text-uppercase">Ville : </span><span
                                    class="text-capitalize">{{ $user->address }}</span></h3>
                        </div>
                    </div>
                    <div class="col-12 d-none d-md-block" style="margin-top:4rem ">
                        <h1 class="bg-bleu text-blanc text-center p-3 text-uppercase flamaBold fs-1">
                            {{ $user->quarter }}

                        </h1>
                    </div>
                </div>
                {{-- PHOTO DESKTOP --}}
                 <div class="col-md-4 d-none d-md-blo2
                     @if( $user->profile_image )
                        <!-- Si l'entreprise a un logo, affichez-le -->
                        <img src="{{ asset('storage/' . $user->profile_image) }}" class="w-100 img-fluid"
                            style="object-fit: cover; height: 510px" />
                    @else
                        <!-- Si l'entreprise n'a pas de logo, affichez l'image par défaut -->
                        <div> <img src="{{ asset('assets/images/nO_image.jpg') }}" class="w-100 img-fluid"
                                style="object-fit: cover; height: 510px" /></div>
                    @endif
                </div>
                {{-- PHOTO DESKTOP --}}
                {{-- <div class="col-12 mt-3 d-md-none">
                    <h1 class="bg-bleu text-blanc text-center p-3 text-uppercase flamaBold fs-1">
                        {{ $user->description }}
                    </h1>
                </div> --}}
            </div>
        </div>
        {{-- <div class="container bg-blanc p-5 mt-3">
            <h3 class="flamaBold">Compétences</h3>
            <p class="texteJustify fs-4 text-uppercase">
                @if ($profile->competences)
                    @foreach ($profile->competences as $competence)
                        {{ $competence }},
                    @endforeach
                @endif
            </p>
        </div> --}}
        {{-- <div class="container bg-blanc p-5 mt-3">
            <h3 class="flamaBold">Qui suis je ?</h3>
            <p class="texteJustify fs-4">
                {{ $user->description }}
            </p>
        </div> --}}
        {{-- BOUTONS DESKTOP --}}
        <div class="container bg-blanc p-5  mt-3 d-none d-md-block">
            <div class="row">
                <div class="col-12 col-md-4">
                    <a class="btn w-100 bg-vert text-blanc flamaSemiBold fs-4"
                        href="{{ route('profile.edit') }}"><i class="fa-solid fa-pencil fa-shake me-2"
                            style="color: #ffffff;"></i>Modifier mon profil</a>
                </div>
                {{-- <div class="col-12 col-md-4">
                    <a class="btn w-100 bg-bleu text-blanc flamaSemiBold fs-4"
                        href="{{ asset('storage/' . $profile->cv) }}" target="_blank"><i
                            class="fa-solid fa-envelope fa-flip me-2" style="color: #ffffff;"></i>Voir mon
                        CV</a>
                </div>
                <div class="col-12 col-md-4">
                    <a class="btn w-100 bg-rouge text-blanc flamaSemiBold fs-4"href="{{ route('apprenant.modifiepwd') }}"><i
                            class="fa-solid fa-pencil fa-shake me-2" style="color: #ffffff;"></i>Modifier mot de passe</a>
                </div> --}}
            </div>
        </div>
        {{-- BOUTONS DESKTOP --}}
{{-- --------------------------------------------------------------------- --}}
        {{-- BOUTONS MOBILE --}}
        <div class="container bg-blanc p-5  mt-3 mb-3 d-md-none">
            <div class="row">
                <div class="col-12 col-md-4">
                    <a class="btn w-100 bg-vert text-blanc flamaSemiBold fs-4"
                        href=" {{ route('profile.edit') }}"><i class="fa-solid fa-pencil fa-shake me-2"
                            style="color: #ffffff;"></i>Modifier mon profil</a>
                </div>
                {{-- <div class="col-12 col-md-4 mt-3">
                    <a class="btn w-100 bg-bleu text-blanc flamaSemiBold fs-4"
                        href="{{ asset('storage/' . $profile->cv) }}" target="_blank"><i
                            class="fa-solid fa-file fa-shake me-2" style="color: #ffffff;"></i>Voir mon CV</a>
                </div>
                <div class="col-12 col-md-4 mt-3">
                    <a class="btn w-100 bg-rouge text-blanc flamaSemiBold fs-4"
                        href="{{ route('apprenant.modifiepwd') }}"><i class="fa-solid fa-pencil fa-shake me-2"
                            style="color: #ffffff;"></i>Modifier mot de passe</a>
                </div> --}}
            </div>
        </div>
        {{-- BOUTONS MOBILE --}}
    </div>
@endsection
