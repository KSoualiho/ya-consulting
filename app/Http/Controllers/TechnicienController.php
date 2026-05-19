<?php

namespace App\Http\Controllers;

use App\Models\Technicien;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TechnicienController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'manager') {
                abort(403, 'Seuls les admins et managers peuvent gérer les techniciens');
            }
            return $next($request);
        });
    }

    // Liste des techniciens
    public function index()
    {
        $techniciens = Technicien::with('interventions')->orderBy('nom')->get();
        
        foreach ($techniciens as $technicien) {
            $technicien->charge = $technicien->charge;
            $technicien->nbInterventions = $technicien->interventions()->count();
        }
        
        return view('techniciens.index', compact('techniciens'));
    }

    public function create()
    {
        return view('techniciens.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:100',
        'telephone' => 'nullable|string|max:20',
        'specialite' => 'nullable|string|max:100',
        'email' => 'nullable|email|unique:techniciens,email',
        'actif' => 'boolean'
    ]);

    $validated['actif'] = $request->has('actif');
    
    // Créer le technicien
    $technicien = Technicien::create($validated);
    
    // Créer automatiquement un compte utilisateur pour ce technicien
    if ($validated['email']) {
        User::create([
            'name' => $validated['nom'],
            'email' => $validated['email'],
            'password' => Hash::make('password123'), // Mot de passe par défaut
            'role' => 'technicien'
        ]);
    }

    return redirect()->route('techniciens.index')
        ->with('success', 'Technicien ajouté avec succès. Compte utilisateur créé (mot de passe: password123)');
}
    public function show(Technicien $technicien)
    {
        $technicien->load('interventions.client');
        $interventionsEnCours = $technicien->interventions()->where('statut', 'en_cours')->get();
        $interventionsPlanifiees = $technicien->interventions()->where('statut', 'planifiee')->orderBy('date_heure')->get();
        
        return view('techniciens.show', compact('technicien', 'interventionsEnCours', 'interventionsPlanifiees'));
    }

    public function edit(Technicien $technicien)
    {
        return view('techniciens.edit', compact('technicien'));
    }

    public function update(Request $request, Technicien $technicien)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'telephone' => 'nullable|string|max:20',
            'specialite' => 'nullable|string|max:100',
            'email' => 'nullable|email|unique:techniciens,email,' . $technicien->id,
            'actif' => 'boolean'
        ]);

        $validated['actif'] = $request->has('actif');
        
        $technicien->update($validated);

        return redirect()->route('techniciens.index')
            ->with('success', 'Technicien modifié avec succès');
    }

    public function destroy(Technicien $technicien)
    {
        if ($technicien->interventions()->count() > 0) {
            return back()->with('error', 'Impossible de supprimer ce technicien car il a des interventions assignées.');
        }
        
        $technicien->delete();
        
        return redirect()->route('techniciens.index')
            ->with('success', 'Technicien supprimé avec succès');
    }
}
