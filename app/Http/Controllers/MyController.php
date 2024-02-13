<?php

namespace App\Http\Controllers;

use App\Models\HouseModel;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function home()
    {
        // Récupère toutes les maisons depuis la base de données avec pagination (10 maisons par page)
        $maisons = HouseModel::paginate(12);

        // Passe les maisons à la vue de la page d'accueil
        return view('welcome', compact('maisons'));
    }

    public function maisonDetailes($maison)
    {
        // Récupérez les détails de la maison à partir de la base de données
        $maison = HouseModel::findOrFail($maison);

        // Retournez la vue avec les détails de la maison
        return view('detailess', compact('maison'));
    }

    function contact()
    {
        return view('contact');
    }

    function service()
    {
        return view('service');
    }

    function aproposDeNous()
    {

        return view('apropos');
    }
    public function filtrerMaisons(Request $request)
    {
        // Récupérez les critères de filtrage depuis la requête
        $ville = $request->input('ville');
        $typeMaison = $request->input('type_maison');
        $quartier = $request->input('quartier');
        $loyer = $request->input('loyer');
        // Effectuez le filtrage des maisons en fonction des critères
        $query = HouseModel::query();
        if ($ville !== null && $ville !== '') {
            // Vérifiez si une ville est sélectionnée
            $query->where('ville', $ville);
        }
        if ($typeMaison !== null && $typeMaison !== '') {
            $query->where('type_maison', $typeMaison);
        }
        if ($quartier !== null && $quartier !== '') {
            $query->where('quartier', $quartier);
        }
        if ($loyer) {
            if ($loyer === 'plus de 80000') {
                // Si l'option "Plus de - 80 000 F CFA" est sélectionnée,
                // vous pouvez gérer ce cas spécifiquement, par exemple :
                $query->where('loyer', '>', 80000);
            } else {
                // Pour les autres plages de loyers, utilisez explode comme avant
                [$minLoyer, $maxLoyer] = explode('-', $loyer);
                $query->whereBetween('loyer', [$minLoyer, $maxLoyer]);
            }
        }
        $maisons = $query->paginate(12);
        // Retournez la vue avec les résultats du filtrage
        return view('welcome', compact('maisons'));
    }
}
