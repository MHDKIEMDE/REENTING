<?php

namespace App\Http\Controllers;

use App\Models\HouseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProController extends Controller
{

    public function prohome()
    {
        $maisons = HouseModel::where('user_id', auth()->id())->paginate(12);

        return view('dashboard.proprietaire.show', compact('maisons'));
    }


    public function showAllHouses()
    {
        $maisons = HouseModel::paginate(12);
        return view('dashboard.proprietaire.show', compact('maisons'));
    }
public function storeHouse(Request $request)
{
    // Validez les données du formulaire
    $request->validate([
        'ville' => 'required',
        'nbChambres' => 'required|integer',
        'typeMaison' => 'required|in:2_pieces,3_pieces,entrer_coucher',
        'quartier' => 'required',
        'loyer' => 'required|numeric',
        'options' => 'array',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    // Créez une nouvelle maison
    $maison = new HouseModel([
        'ville' => $request->input('ville'),
        'nb_chambres' => $request->input('nbChambres'),
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
    return redirect()->route('pro.showAllHouses')->with('success', 'La maison a été ajoutée avec succès !');
}
public function createHouse()
{
    return view('dashboard.proprietaire.index'); // Remplacez 'dashboard.admin.create' par le nom de votre vue de formulaire d'ajout
}

public function updateHouse(Request $request, $id)
{
    // Validez les données du formulaire
    $request->validate([
        'ville' => 'required',
        'nbChambres' => 'required|integer',
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
    $maison->nb_chambres = $request->input('nbChambres');
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
    return redirect()->route('pro.showAllHouses')->with('success', 'La maison a été mise à jour avec succès !');
}

public function editHouse($id)
{
    $maison = HouseModel::find($id);
    return view('dashboard.proprietaire.edit', compact('maison'));
}


public function deleteHouse($id)
    {
        $maison = HouseModel::find($id);

        if ($maison->image) {
            Storage::disk('public')->delete($maison->image);
        }

        $maison->delete();
        return redirect()->route('pro.showAllHouses')->with('success', 'La maison a été supprimée avec succès !');
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('c', compact('user'));
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
        return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès !');
    }
    public function showProfile()
    {
        $user = auth()->user();

        return view('dashboard.proprietaire.profil', compact('user'));
    }
    function contact()
    {
        return view('dashboard.proprietaire.contact');
    }

    function service()
    {
        return view('dashboard.proprietaire.service');
    }

    function aproposDeNous()
    {

        return view('dashboard.proprietaire.apropos');
    }
}
