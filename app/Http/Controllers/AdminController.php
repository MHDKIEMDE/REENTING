<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HouseModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    function aproposDeNous()
    {

        return view('dashboard.admin.apropos');
    }
    public function adminHome()
    {
        // Récupère toutes les maisons depuis la base de données avec les utilisateurs associés (12 maisons par page)
        $maisons = HouseModel::with('user')->paginate(12);
    
        // Passe les maisons à la vue de la page d'accueil
        return view('dashboard.admin.home', compact('maisons'));
    }
    public function showAllHouses()
    {
        $maisons = HouseModel::where('user_id', auth()->id())
            ->orderBy('id', 'desc') // Trie par ordre décroissant de l'identifiant (supposant que l'identifiant est auto-incrémenté)
            ->paginate(12);
        return view('dashboard.admin.show', compact('maisons'));
    }
    public function showAllUsers()
    {
        // Récupère tous les utilisateurs depuis la base de données
        $users = User::all();

        // Vérifiez si des utilisateurs ont été récupérés
        if ($users->count() > 0) {
            // Passe les utilisateurs à la vue du tableau de bord de l'admin
            return view('dashboard.admin.showAllUsers', compact('users'));
        }

        // S'il n'y a pas d'utilisateurs, renvoyez un message d'erreur ou redirigez l'utilisateur vers une autre page
        return view('dashboard.admin.showAllUsers')->with('error', 'Aucun utilisateur trouvé.');
    }


    public function viewProfile($id)
    {
        // Récupérer l'utilisateur en fonction de l'ID
        $user = User::find($id);

        if (!$user) {
            // Rediriger avec un message d'erreur si l'utilisateur n'est pas trouvé
            return redirect()->route('admin.users')->with('error', 'Utilisateur non trouvé !');
        }

        // Afficher la vue du profil de l'utilisateur avec les données de l'utilisateur
        return view('dashboard.admin.viewprofile', compact('user'));
    }



    public function deleteUser($id)
    {
        // Trouver l'utilisateur en fonction de l'ID
        $user = User::find($id);
        // Vérifier si l'utilisateur existe
        if ($user) {
            // Supprimer l'utilisateur
            $user->delete();

            // Rediriger l'administrateur vers la page de liste des utilisateurs avec un message de succès
            return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès !');
        }

        // Rediriger l'administrateur avec un message d'erreur si l'utilisateur n'existe pas
        return redirect()->route('admin.users')->with('error', 'Utilisateur non trouvé !');
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
        // Créez une nouvelle maison
        $maison = new HouseModel([
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
        return redirect()->route('showAllHouses')->with('success', 'La maison a été ajoutée avec succès !');
    }

    public function createHouse()
    {
        return view('dashboard.admin.index');
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
        return redirect()->route('admin.showAllHouses')->with('success', 'La maison a été mise à jour avec succès !');
    }

    public function editHouse($id)
    {
        $maison = HouseModel::findOrFail($id);
        return view('dashboard.admin.edit', compact('maison'));
    }

    public function deleteHouse($id)
    {
        $maison = HouseModel::findOrFail($id);

        if ($maison->image) {
            Storage::disk('public')->delete($maison->image);
        }
        $maison->delete();
        return redirect()->route('admin.showAllHouses')->with('success', 'La maison a été supprimée avec succès !');
    }


    public function showRegistrationForm()
    {
        return view('dashboard.admin.registerUsers');
    }

    public function registerUsers(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        dd($request->email);
        return redirect()->route('login')->with('success', 'Account created successfully! Please login.');
    }


    public function showLoginForm()
    {
        return view('dashboard.admin.loginUsers');
    }
    public function loginUsers(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('admin.adminHome')); // Rediriger vers le tableau de bord après la connexion réussie
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
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
        return view('dashboard.admin.home', compact('maisons'));
    }

    public function maisonDetailes($maison)
    {
        // Récupérez les détails de la maison à partir de la base de données
        $maison = HouseModel::findOrFail($maison);

        // Retournez la vue avec les détails de la maison
        return view('dashboard.admin.detailes', compact('maison'));
    }
}
