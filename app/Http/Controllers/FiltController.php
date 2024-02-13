<?php

namespace App\Http\Controllers;

use App\Models\HouseModel;
use Illuminate\Http\Request;


class FiltController extends Controller
{
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

        if ($quartier !== null && $quartier !== ''  ) {
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
