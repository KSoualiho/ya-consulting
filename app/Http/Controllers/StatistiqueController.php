<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\Client;
use App\Models\Technicien;
use App\Models\Rapport;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatistiqueController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'manager') {
                abort(403, 'Seuls les admins et managers peuvent voir les statistiques');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
    // Période par défaut : 30 jours
    $period = $request->get('period', 30);
    
    // Statistiques de base
    $totalInterventions = Intervention::count();
    $totalClients = Client::count();
    $totalTechniciens = Technicien::count();
    
    // Taux de réussite
    $terminees = Intervention::where('statut', 'terminee')->count();
    $tauxReussite = $totalInterventions > 0 ? round(($terminees / $totalInterventions) * 100) : 0;
    
    // Interventions par statut
    $statuts = [
        'en_attente' => Intervention::where('statut', 'en_attente')->count(),
        'planifiee' => Intervention::where('statut', 'planifiee')->count(),
        'en_cours' => Intervention::where('statut', 'en_cours')->count(),
        'terminee' => $terminees,
        'annulee' => Intervention::where('statut', 'annulee')->count(),
    ];
    
    // Interventions par priorité
    $priorites = [
        'urgente' => Intervention::where('priorite', 'urgente')->count(),
        'haute' => Intervention::where('priorite', 'haute')->count(),
        'moyenne' => Intervention::where('priorite', 'moyenne')->count(),
        'basse' => Intervention::where('priorite', 'basse')->count(),
    ];
    
    // Urgences 24h
    $urgences24h = Intervention::where('priorite', 'urgente')
        ->whereIn('statut', ['planifiee', 'en_cours', 'en_attente'])
        ->count();
    
    // Temps moyen d'intervention
    $tempsMoyen = Rapport::avg('duree_minutes');
    
    // Satisfaction moyenne
    $satisfactionMoyenne = Rapport::avg('satisfaction_client') ?? 0;
    
    // Top techniciens avec nombre d'interventions
    $topTechniciens = Technicien::withCount('interventions')
        ->orderBy('interventions_count', 'desc')
        ->take(5)
        ->get();
    
    // Ajouter une satisfaction fictive pour l'exemple
    foreach ($topTechniciens as $technicien) {
        $technicien->satisfaction = 4.5 + (rand(0, 5) / 10);
        $technicien->evolution = rand(-5, 15);
    }
    
    // Évolution en pourcentage (simulée)
    $evolutionPourcentage = 12;
    $evolutionTemps = -5;
    
    // CORRECTION : utiliser la vue statistiques.index, PAS planning.index
    return view('statistiques.index', compact(
        'totalInterventions', 'totalClients', 'totalTechniciens',
        'tauxReussite', 'statuts', 'priorites', 'urgences24h',
        'tempsMoyen', 'satisfactionMoyenne', 'topTechniciens',
        'evolutionPourcentage', 'evolutionTemps'
    ));
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

        $interventions = $query->get();

        $events = [];
        foreach ($interventions as $intervention) {
            $color = $this->getColorByPriorite($intervention->priorite);
            
            $events[] = [
                'id' => $intervention->id,
                'title' => $intervention->numero . ' - ' . ($intervention->client->nom_entreprise ?? 'N/A'),
                'start' => $intervention->date_heure,
                'end' => date('Y-m-d H:i:s', strtotime($intervention->date_heure . ' +2 hours')),
                'backgroundColor' => $color,
                'borderColor' => $color,
                'extendedProps' => [
                    'client' => $intervention->client->nom_entreprise ?? 'N/A',
                    'technicien' => $intervention->technicien->nom ?? 'Non assigné',
                    'type' => $intervention->type_intervention,
                    'priorite' => $intervention->priorite,
                    'statut' => $intervention->statut
                ]
            ];
        }

        return response()->json($events);
    }

    private function getColorByPriorite($priorite)
    {
        switch ($priorite) {
            case 'urgente':
                return '#dc3545'; // rouge
            case 'haute':
                return '#fd7e14'; // orange
            case 'moyenne':
                return '#ffc107'; // jaune
            case 'basse':
                return '#28a745'; // vert
            default:
                return '#6c757d'; // gris
        }
    }
}