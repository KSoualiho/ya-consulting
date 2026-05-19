<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\Client;
use App\Models\Technicien;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterventionController extends Controller
{
   public function index()
{
    if (Auth::user()->role === 'technicien') {
        
        // Trouver le technicien lié à l'utilisateur connecté
        $technicien = \App\Models\Technicien::where('user_id', Auth::id())->first();

        if (!$technicien) {
            // Aucun profil technicien lié à ce compte - retourner une collection paginée vide
            $interventions = Intervention::where('id', 0)->paginate(10);
            return view('interventions.index', compact('interventions'));
        }

        $interventions = Intervention::with(['client', 'technicien'])
            ->where('technicien_id', $technicien->id)
            ->orderBy('date_heure', 'desc')
            ->paginate(10);

    } else {
        // Admin et Manager voient tout
        $interventions = Intervention::with(['client', 'technicien'])
            ->orderBy('date_heure', 'desc')
            ->paginate(10);
    }

    return view('interventions.index', compact('interventions'));
}
    public function create()
    {
        // 🔒 AJOUT : Seul admin et manager peuvent créer
        if (Auth::user()->role === 'technicien') {
            return redirect()->route('dashboard')->with('error', 'Non autorisé');
        }
        
        $clients = Client::orderBy('nom_entreprise')->get();
        $techniciens = Technicien::where('actif', true)->orderBy('nom')->get();
        
        return view('interventions.create', compact('clients', 'techniciens'));
    }

    public function store(Request $request)
    {
        // 🔒 AJOUT : Seul admin et manager peuvent créer
        if (Auth::user()->role === 'technicien') {
            return redirect()->route('dashboard')->with('error', 'Non autorisé');
        }
        
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type_intervention' => 'required|string|max:100',
            'description' => 'required|string',
            'date_heure' => 'nullable|date',
            'heure' => 'nullable|date_format:H:i',
            'technicien_id' => 'nullable|exists:techniciens,id',
            'priorite' => 'required|in:basse,moyenne,haute,urgente'
        ]);

        // Combiner la date et l'heure
        if ($request->date_heure && $request->heure) {
            $validated['date_heure'] = $request->date_heure . ' ' . $request->heure;
        } elseif ($request->date_heure) {
            $validated['date_heure'] = $request->date_heure . ' 00:00';
        }
        
        unset($validated['heure']); // Supprimer le champ heure du validated

        $date = date('Ymd');
        $count = Intervention::where('numero', 'like', "INT-{$date}-%")->count() + 1;
        $validated['numero'] = "INT-{$date}-" . str_pad($count, 4, '0', STR_PAD_LEFT);
        $validated['statut'] = $request->date_heure ? 'planifiee' : 'en_attente';
        $validated['created_by'] = auth()->id();

        $intervention = Intervention::create($validated);

        if ($request->technicien_id) {
            NotificationService::assignation($request->technicien_id, $intervention);
        }

        return redirect()->route('interventions.index')
            ->with('success', 'Intervention créée avec succès. Numéro : ' . $intervention->numero);
    }

    public function show(Intervention $intervention)
    {
        // 🔒 AJOUT : Le technicien ne voit que ses interventions
        if (Auth::user()->role === 'technicien') {
            $technicien = \App\Models\Technicien::where('user_id', Auth::id())->first();
            if (!$technicien || $intervention->technicien_id !== $technicien->id) {
                return redirect()->route('dashboard')->with('error', 'Accès non autorisé');
            }
        }
        
        $intervention->load(['client', 'technicien', 'rapport']);
        return view('interventions.show', compact('intervention'));
    }

    public function edit(Intervention $intervention)
    {
        // 🔒 AJOUT : Seul admin et manager peuvent modifier
        if (Auth::user()->role === 'technicien') {
            return redirect()->route('dashboard')->with('error', 'Non autorisé');
        }
        
        $clients = Client::orderBy('nom_entreprise')->get();
        $techniciens = Technicien::orderBy('nom')->get();
        
        return view('interventions.edit', compact('intervention', 'clients', 'techniciens'));
    }

    public function update(Request $request, Intervention $intervention)
    {
        // 🔒 AJOUT : Seul admin et manager peuvent modifier
        if (Auth::user()->role === 'technicien') {
            return redirect()->route('dashboard')->with('error', 'Non autorisé');
        }
        
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type_intervention' => 'required|string|max:100',
            'description' => 'required|string',
            'date_heure' => 'nullable|date',
            'technicien_id' => 'nullable|exists:techniciens,id',
            'priorite' => 'required|in:basse,moyenne,haute,urgente'
        ]);

        $oldTechnicienId = $intervention->technicien_id;
        $intervention->update($validated);

        if ($validated['technicien_id'] && $oldTechnicienId != $validated['technicien_id']) {
            NotificationService::assignation($validated['technicien_id'], $intervention);
        }

        return redirect()->route('interventions.index')
            ->with('success', 'Intervention modifiée avec succès');
    }

    public function updateStatus(Request $request, Intervention $intervention)
    {
        // 🔒 AJOUT : Seul le technicien assigné ou admin/manager peut changer le statut
        if (Auth::user()->role === 'technicien' && $intervention->technicien_id !== Auth::id()) {
            return response()->json(['error' => 'Non autorisé'], 403);
        }
        
        $request->validate([
            'statut' => 'required|in:en_cours,terminee,annulee'
        ]);

        $oldStatut = $intervention->statut;
        $intervention->statut = $request->statut;
        $intervention->save();

        if ($oldStatut != $request->statut) {
            $managers = User::where('role', 'manager')->get();
            foreach ($managers as $manager) {
                NotificationService::changementStatut($manager->id, $intervention, $request->statut);
            }
        }

        if ($request->statut == 'terminee' && $intervention->technicien_id) {
            NotificationService::rappelRapport($intervention->technicien_id, $intervention);
        }

        return response()->json(['success' => true]);
    }

    public function destroy(Intervention $intervention)
    {
        // 🔒 AJOUT : Seul admin peut supprimer
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Non autorisé');
        }
        
        $intervention->delete();
        
        return redirect()->route('interventions.index')
            ->with('success', 'Intervention supprimée');
    }
}