<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use App\Models\Intervention;
use App\Models\User;
use App\Services\NotificationService;
use App\Services\AuditService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{
    public function index()
    {
        // 🔒 AJOUT : Filtrer selon le rôle
        if (Auth::user()->role === 'technicien') {
            $rapports = Rapport::with('intervention.client', 'intervention.technicien')
                ->whereHas('intervention', function($q) {
                    $q->where('technicien_id', Auth::id());
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $rapports = Rapport::with('intervention.client', 'intervention.technicien')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        
        return view('rapports.index', compact('rapports'));
    }

    public function create(Intervention $intervention)
    {
        // 🔒 AJOUT : Seul le technicien assigné peut créer un rapport
        if (Auth::user()->role === 'technicien' && $intervention->technicien_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Non autorisé');
        }
        
        if ($intervention->statut !== 'terminee') {
            return redirect()->route('interventions.index')
                ->with('error', 'Seules les interventions terminées peuvent avoir un rapport.');
        }

        if ($intervention->rapport) {
            return redirect()->route('interventions.show', $intervention)
                ->with('error', 'Un rapport existe déjà pour cette intervention.');
        }

        return view('rapports.create', compact('intervention'));
    }

    public function store(Request $request)
    {
        // 🔒 AJOUT : Vérifier les droits avant validation
        $intervention = Intervention::find($request->intervention_id);
        if (Auth::user()->role === 'technicien' && $intervention->technicien_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Non autorisé');
        }
        
        $validated = $request->validate([
            'intervention_id' => 'required|exists:interventions,id',
            'description' => 'required|string',
            'actions_realisees' => 'nullable|string',
            'pieces_utilisees' => 'nullable|string',
            'duree_minutes' => 'required|integer|min:1',
            'photo' => 'nullable|image|max:2048',
            'signature_client' => 'nullable|string',
            'satisfaction_client' => 'nullable|integer|min:1|max:5'
        ]);

        $rapport = new Rapport();
        $rapport->intervention_id = $validated['intervention_id'];
        $rapport->description = $validated['description'];
        $rapport->actions_realisees = $validated['actions_realisees'];
        $rapport->pieces_utilisees = $validated['pieces_utilisees'];
        $rapport->duree_minutes = $validated['duree_minutes'];
        $rapport->signature_client = $validated['signature_client'] ?? null;
        $rapport->satisfaction_client = $validated['satisfaction_client'] ?? null;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('rapports_photos', 'public');
            $rapport->photo_path = $path;
        }

        $rapport->save();
        
        // Enregistrer l'audit
        AuditService::logRapportChange(
            $rapport,
            'create',
            null,
            $rapport->getAttributes()
        );

        // Notification aux managers
        $managers = User::where('role', 'manager')->get();
        foreach ($managers as $manager) {
            NotificationService::rapportSoumis($manager->id, $intervention);
        }

        return redirect()->route('interventions.show', $rapport->intervention_id)
            ->with('success', 'Rapport soumis avec succès. En attente de validation.');
    }

    public function valider(Rapport $rapport)
    {
        // 🔒 AJOUT : Seul admin et manager peuvent valider
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'manager') {
            return redirect()->route('dashboard')
                ->with('error', 'Seul un manager peut valider les rapports');
        }

        $oldData = $rapport->getAttributes();
        $rapport->valide = true;
        $rapport->valide_par = Auth::id();
        $rapport->date_validation = now();
        $rapport->save();
        
        // Enregistrer l'audit
        AuditService::logRapportChange(
            $rapport,
            'validate',
            $oldData,
            $rapport->getAttributes()
        );

        // Notification au technicien
        if ($rapport->intervention->technicien_id) {
            NotificationService::rapportValide($rapport->intervention->technicien_id, $rapport->intervention);
        }

        return redirect()->route('interventions.show', $rapport->intervention_id)
            ->with('success', 'Rapport validé avec succès.');
    }

    public function show(Rapport $rapport)
    {
        // 🔒 AJOUT : Le technicien ne voit que ses rapports
        if (Auth::user()->role === 'technicien') {
            $intervention = $rapport->intervention;
            if ($intervention->technicien_id !== Auth::id()) {
                return redirect()->route('dashboard')->with('error', 'Non autorisé');
            }
        }
        
        $rapport->load('intervention.client', 'intervention.technicien');
        return view('rapports.show', compact('rapport'));
    }
}