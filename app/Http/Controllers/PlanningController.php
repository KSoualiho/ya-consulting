<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\Technicien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlanningController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'technicien') {
            $technicien = Technicien::where('user_id', Auth::id())->first();
            if (!$technicien) {
                abort(403, 'Technicien non trouvé');
            }
            $techniciens = collect([$technicien]);
        } else {
            $techniciens = Technicien::where('actif', true)->orderBy('nom')->get();
        }
    
    $events = Intervention::with(['client', 'technicien'])
        ->whereNotNull('date_heure')
        ->whereIn('statut', ['planifiee', 'en_cours'])
        ->get()
        ->map(function($intervention) {
            return [
                'id' => $intervention->id,
                'title' => $intervention->numero . ' - ' . ($intervention->client->nom_entreprise ?? 'N/A'),
                'start' => $intervention->date_heure,
                'extendedProps' => [
                    'client' => $intervention->client->nom_entreprise ?? 'N/A',
                    'technicien' => $intervention->technicien->nom ?? 'Non assigné',
                    'type' => $intervention->type_intervention,
                    'priorite' => $intervention->priorite
                ]
            ];
        });
    
    // Si aucune intervention, initialiser un tableau vide
    if (!$events) {
        $events = [];
    }
    
    return view('planning.index', compact('techniciens', 'events'));
}
    public function getEvents(Request $request)
    {
        $query = Intervention::with(['client', 'technicien'])
            ->whereNotNull('date_heure')
            ->whereIn('statut', ['planifiee', 'en_cours']);

        // Filtrer par technicien
        if ($request->technicien_id) {
            $query->where('technicien_id', $request->technicien_id);
        }

        // Filtrer par période
        if ($request->start) {
            $query->where('date_heure', '>=', $request->start);
        }
        if ($request->end) {
            $query->where('date_heure', '<=', $request->end);
        }

        $interventions = $query->get();

        $events = [];
        foreach ($interventions as $intervention) {
            $color = $this->getColorByPriorite($intervention->priorite);
            $borderColor = $this->getBorderColorByPriorite($intervention->priorite);
            
            $events[] = [
                'id' => $intervention->id,
                'title' => $intervention->numero . ' - ' . ($intervention->client->nom_entreprise ?? 'N/A'),
                'start' => $intervention->date_heure,
                'end' => date('Y-m-d H:i:s', strtotime($intervention->date_heure . ' +2 hours')),
                'backgroundColor' => $color,
                'borderColor' => $borderColor,
                'textColor' => '#ffffff',
                'extendedProps' => [
                    'client' => $intervention->client->nom_entreprise ?? 'N/A',
                    'technicien' => $intervention->technicien->nom ?? 'Non assigné',
                    'type' => $intervention->type_intervention,
                    'priorite' => $intervention->priorite,
                    'statut' => $intervention->statut,
                    'description' => $intervention->description
                ]
            ];
        }

        return response()->json($events);
    }

    public function checkConflicts(Request $request)
    {
        $technicienId = $request->technicien_id;
        $dateHeure = $request->date_heure;
        $interventionId = $request->intervention_id;

        $query = Intervention::where('technicien_id', $technicienId)
            ->where('date_heure', $dateHeure)
            ->whereIn('statut', ['planifiee', 'en_cours']);

        if ($interventionId) {
            $query->where('id', '!=', $interventionId);
        }

        $conflict = $query->exists();

        return response()->json([
            'has_conflict' => $conflict,
            'message' => $conflict ? 'Ce technicien a déjà une intervention à cette heure' : 'Disponible'
        ]);
    }

    private function getColorByPriorite($priorite)
    {
        switch ($priorite) {
            case 'urgente':
                return '#dc3545'; // rouge
            case 'haute':
                return '#fd7e14'; // orange
            case 'moyenne':
                return '#0d6efd'; // bleu
            case 'basse':
                return '#198754'; // vert
            default:
                return '#6c757d'; // gris
        }
    }

    private function getBorderColorByPriorite($priorite)
    {
        switch ($priorite) {
            case 'urgente':
                return '#b02a37';
            case 'haute':
                return '#e06a00';
            case 'moyenne':
                return '#0a58ca';
            case 'basse':
                return '#157347';
            default:
                return '#5c636a';
        }
    }
}
