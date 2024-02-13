<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HouseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DemaController extends Controller
{

    public function showAllHouses()
    {
        $maisons = HouseModel::where('user_id', auth()->id())
                             ->orderBy('id', 'desc') // Trie par ordre décroissant de l'identifiant (supposant que l'identifiant est auto-incrémenté)
                             ->paginate(12);
    
        return view('dashboard.demarcheurs.show', compact('maisons'));
    }
    
    
    public function demahome()
    {
        // Récupère toutes les maisons depuis la base de données avec pagination (10 maisons par page)
        $maisons = HouseModel::paginate(12);

        // Passe les maisons à la vue de la page d'accueil
        return view('dashboard.demarcheurs.demahome', compact('maisons'));
    }

    function contact()
    {
        return view('dashboard.demarcheurs.contact');
    }

    function service()
    {
        return view('dashboard.demarcheurs.service');
    }

    function aproposDeNous()
    {

        return view('dashboard.demarcheurs.apropos');
    }
    public function createHouse()
    {
        return view('dashboard.demarcheurs.index');
    }

    public function storeHouse(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'ville' => 'required',
            'typeMaison' => 'required|in:2_pieces,3_pieces,entrer_coucher',
            'quartier' => 'required',
            'loyer' => 'required|numeric',
            'options' => 'array',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Récupérez l'`user_id` de l'utilisateur actuellement authentifié
        $userId = auth()->id();

        // Créez une nouvelle maison avec l'`user_id` associé
        $maison = new HouseModel([
            'user_id' => $userId,
            'ville' => $request->input('ville'),
            'type_maison' => $request->input('typeMaison'),
            'quartier' => $request->input('quartier'),
            'loyer' => $request->input('loyer'),
            'options' => $request->input('options') ?? [],
        ]);

        // Enregistrez l'image si elle est fournie
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('maison_images', 'public');
            $maison->image = $imagePath;
        }

        // Enregistrez la maison
        $maison->save();

        // Redirigez l'utilisateur vers la page souhaitée avec un message de succès
        return redirect()->route('dema.showAllHouses')->with('success', 'La maison a été ajoutée avec succès !');
    }


    public function editHouse($id)
    {
        $maison = HouseModel::find($id);
        return view('dashboard.demarcheurs.edit', compact('maison'));
    }
    public function updateHouse(Request $request, $id)
    {
        // Validez les données du formulaire
        $request->validate([
            'ville' => 'required',
            'typeMaison' => 'required|in:2_pieces,3_pieces,entrer_coucher',
            'quartier' => 'required',
            'loyer' => 'required|numeric',
            'options' => 'array',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Récupérez la maison à partir de la base de données en fonction de son ID
        $maison = HouseModel::find($id);
        // Mettez à jour les informations de la maison
        $maison->ville = $request->input('ville');
        $maison->type_maison = $request->input('typeMaison');
        $maison->quartier = $request->input('quartier');
        $maison->loyer = $request->input('loyer');

        $maison->options = $request->input('options') ?? [];
        // Enregistrez la nouvelle image si elle est fournie
        if ($request->hasFile('image')) {
            // Supprimez l'ancienne image si elle existe
            if ($maison->image) {
                Storage::disk('public')->delete($maison->image);
            }
            $imagePath = $request->file('image')->store('maison_images', 'public');
            $maison->image = $imagePath;
        }
        // Enregistrez la maison mise à jour
        $maison->save();
        // Redirigez l'utilisateur vers la page souhaitée avec un message de succès
        return redirect()->route('dema.showAllHouses')->with('success', 'La maison a été mise à jour avec succès !');
    }


    public function deleteHouse($id)
    {
        $maison = HouseModel::find($id);

        if ($maison->image) {
            Storage::disk('public')->delete($maison->image);
        }

        $maison->delete();
        return redirect()->route('dema.showAllHouses')->with('success', 'La maison a été supprimée avec succès !');
    }


    public function editProfile()
    {
        $user = auth()->user();
        return view('dashboard.demarcheurs.editprofil', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Validez les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string|max:255',
            'quarter' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'secondary_phone_number' => 'nullable|string|max:20',
        ]);

        // Mettez à jour les champs du modèle utilisateur avec les données du formulaire
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->quarter = $request->input('quarter');
        $user->phone_number = $request->input('phone_number');
        $user->secondary_phone_number = $request->input('secondary_phone_number');

        // Mettez à jour l'image de profil si elle est fournie
        if ($request->hasFile('profile_image')) {
            // Supprimez l'ancienne image de profil s'il y en a
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Enregistrez la nouvelle image de profil dans un répertoire non accessible au public
            $imagePath = $request->file('profile_image')->store('private/images');
            $user->profile_image = $imagePath;
        }
        // Sauvegardez les modifications dans la base de données
        $user->save();

        // Redirigez l'utilisateur vers la page de modification de profil avec un message de succès
        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès !');
    }
    public function showProfile()
    {
        $user = auth()->user();

        return view('dashboard.demarcheurs.profil', compact('user'));
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
        return view('dashboard.demarcheurs.demahome', compact('maisons'));
    }
    public function maisonDetailes($maison)
    {
        // Récupérez les détails de la maison à partir de la base de données
        $maison = HouseModel::findOrFail($maison);

        // Retournez la vue avec les détails de la maison
        return view('dashboard.demarcheurs.detailes', compact('maison'));
    }
}
