<?php

namespace App\Http\Controllers;

use App\Models\HouseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddController extends Controller
{
    // Affiche le formulaire d'ajout de maison
    public function addhouse()
    {
        $maison = new HouseModel(); // Créez une nouvelle instance de Maison
        return view('add.addhouse', compact('maison'));
    }

    // Ajoute une nouvelle maison à la base de données
    public function createHouse(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'ville' => 'required',
            'nb_chambres' => 'required|integer',
            'type_maison' => 'required|in:2_pieces,3_pieces,entrer_coucher',
            'quartier' => 'required',
            'loyer' => 'required|numeric',
            'options' => 'array',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Crée une nouvelle maison avec les données du formulaire
        $maison = new HouseModel([
            'ville' => $request->input('ville'),
            'nb_chambres' => $request->input('nb_chambres'),
            'type_maison' => $request->input('type_maison'),
            'quartier' => $request->input('quartier'),
            'loyer' => $request->input('loyer'),
            'options' => $request->input('options') ?? [],
        ]);

        // Enregistre l'image si elle est fournie
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('maison_images', 'public');
            $maison->image_path = $imagePath;
        }

        // Enregistre la maison dans la base de données
        $maison->save();

        // Redirige vers la liste des maisons avec un message de succès
        return back()->with('success', 'La maison a été ajoutée avec succès !');
    }

    // Affiche les détails d'une maison
    public function showHouse(HouseModel $maison)
    {
        return view('houses.show', compact('maison'));
    }

    // Affiche le formulaire de modification de maison
    public function editHouse(HouseModel $maison)
    {
        return view('admin.editHouse', compact('maison'));
    }

    // Met à jour une maison existante
    public function updateHouse(Request $request, HouseModel $maison)
    {
        // Valide les données du formulaire de mise à jour
        $request->validate([
            'ville' => 'required',
            'nb_chambres' => 'required|integer',
            'type_maison' => 'required|in:2_pieces,3_pieces,entrer_coucher',
            'quartier' => 'required',
            'loyer' => 'required|numeric',
            'options' => 'array',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Met à jour les informations de la maison
        $maison->update([
            'ville' => $request->input('ville'),
            'nb_chambres' => $request->input('nb_chambres'),
            'type_maison' => $request->input('type_maison'),
            'quartier' => $request->input('quartier'),
            'loyer' => $request->input('loyer'),
            'options' => $request->input('options') ?? [],
        ]);

        // Enregistre l'image mise à jour si elle est fournie
        if ($request->hasFile('image')) {
            // Supprime l'ancienne image si elle existe
            if ($maison->image_path) {
                Storage::disk('public')->delete($maison->image_path);
            }

            // Enregistre la nouvelle image
            $imagePath = $request->file('image')->store('maison_images', 'public');
            $maison->image_path = $imagePath;
        }

        // Enregistre la maison mise à jour
        $maison->save();

        // Redirige vers la liste des maisons avec un message de succès
        return redirect()->route('admin.showAllHouses')->with('success', 'La maison a été mise à jour avec succès !');
    }

    // Supprime une maison
    public function deleteHouse(HouseModel $maison)
    {
        // Supprime l'image associée si elle existe
        if ($maison->image_path) {
            Storage::disk('public')->delete($maison->image_path);
        }

        // Supprime la maison
        $maison->delete();

        // Redirige vers la liste des maisons avec un message de succès
        return redirect()->route('maisons.ajout')->with('success', 'La maison a été supprimée avec succès !');
    }
}

