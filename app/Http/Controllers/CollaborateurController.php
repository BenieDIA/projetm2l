<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Collaborateur;
use Illuminate\Support\Facades\Session;

class CollaborateurController extends Controller
{
    // Affiche le formulaire d'ajout de collaborateur
    public function create()
    {
           $user = session('user');
    if (!$user || !$user->isadmin) {
        abort(403, 'Accès refusé');
    }
        return view('create');
    }

    // Traite l'ajout du collaborateur dans la base de données
    public function store(Request $request)
    {
        // Correction de la règle de validation pour 'mail'
        $validatedData = $request->validate([
            'nom'           => 'required',
            'prenom'        => 'required',
            'mail'          => 'required|email|unique:collaborateurs,mail',  // Changer "mail" en "email"
            'poste'         => 'required',
            'mot_de_passe'  => 'required|min:6',
            'confirmation'  => 'required|same:mot_de_passe',
            'pays'          => 'nullable',
            'telephone'     => 'nullable',
            'ville'         => 'nullable',
            'civilite'      => 'nullable',
            'date_naissance'=> 'nullable|date',
            'photo'         => 'nullable|image'
        ]);

        // Création d'un collaborateur
        $collaborateur = new Collaborateur();
        $collaborateur->nom = $request->nom;
        $collaborateur->prenom = $request->prenom;
        $collaborateur->mail = $request->mail;
        $collaborateur->poste = $request->poste;
        $collaborateur->mot_de_passe = bcrypt($request->mot_de_passe);
        $collaborateur->pays = $request->pays;
        $collaborateur->telephone = $request->telephone;
        $collaborateur->ville = $request->ville;
        $collaborateur->civilite = $request->civilite;
        $collaborateur->date_naissance = $request->date_naissance;

        // Gestion de l'upload de photo
        if ($request->hasFile('photo')) {
            $collaborateur->photo = $request->file('photo')->store('photos');
        }

        // Sauvegarde du collaborateur dans la base de données
        $collaborateur->save();

        // Redirige avec un message de succès
        return redirect()->route('collaborateur.create')->with('success', 'Collaborateur ajouté avec succès !');
    }
    public function update(Request $request, $id)
{
    $collaborateur = Collaborateur::findOrFail($id);

    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'mail' => 'required|email|max:255',
        'poste' => 'required|string|max:255',
        'pays' => 'nullable|string|max:255',
        'telephone' => 'nullable|string|max:255',
        'ville' => 'nullable|string|max:255',
        'civilite' => 'nullable|in:monsieur,madame,autre',
        'date_naissance' => 'nullable|date',
        'photo' => 'nullable|image|max:2048',
    ]);

    $collaborateur->nom = $request->nom;
    $collaborateur->prenom = $request->prenom;
    $collaborateur->mail = $request->mail;
    $collaborateur->poste = $request->poste;
    $collaborateur->pays = $request->pays;
    $collaborateur->telephone = $request->telephone;
    $collaborateur->ville = $request->ville;
    $collaborateur->civilite = $request->civilite;
    $collaborateur->date_naissance = $request->date_naissance;


    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
        $collaborateur->photo = $photoPath;
    }

    $collaborateur->save();

    return redirect()->route('connected')->with('success', 'Collaborateur mis à jour avec succès.');
}
public function connected(Request $request)
{
    $currentUser = Session::get('user');
    if (!$currentUser) {
        return redirect('/login')->withErrors('Vous devez être connecté pour accéder à cette page.');
    }

    $lastId = $request->query('last');
    $query = Collaborateur::where('id', '!=', $currentUser->id);
    if ($lastId) {
        $query->where('id', '!=', $lastId);
    }
    $collaborateurs = $query->get();

    if ($collaborateurs->isEmpty()) {
        $collaborateurs = Collaborateur::where('id', '!=', $currentUser->id)->get();
    }

    $collaborateur = $collaborateurs->random();

    // Passe aussi $user à la vue
    return view('connected', [
        'collaborateur' => $collaborateur,
        'user' => $currentUser
    ]);
}


public function edit($id)
{
    $collaborateur = Collaborateur::findOrFail($id);
    return view('edit', compact('collaborateur'));
}
public function destroy($id)
{
    $collaborateur = Collaborateur::findOrFail($id);

    // Supprimer la photo si elle existe
    if ($collaborateur->photo && \Storage::disk('public')->exists($collaborateur->photo)) {
        \Storage::disk('public')->delete($collaborateur->photo);
    }

    $collaborateur->delete();

    return redirect()->route('list')->with('success', 'Collaborateur supprimé avec succès.');
} 
public function index(Request $request)
{
    $search = $request->input('search');

    $collaborateurs = Collaborateur::query()
        ->when($search, function ($query, $search) {
            return $query->where('nom', 'like', "%{$search}%")
                         ->orWhere('prenom', 'like', "%{$search}%");
        })
        ->get();

    return view('list', compact('collaborateurs')); 
}

}
