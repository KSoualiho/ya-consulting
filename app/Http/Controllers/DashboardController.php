<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\Client;
use App\Models\Technicien;
use App\Models\Rapport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\NotificationApp;

class DashboardController extends Controller
{
    public function index()
    {
        // ============================================
        // STATISTIQUES DE BASE
        // ============================================
        $totalInterventions = Intervention::count();
        $totalClients = Client::count();
        $totalTechniciens = Technicien::count();
        
        // ============================================
        // INTERVENTIONS PAR STATUT
        // ============================================
        $interventionsEnAttente = Intervention::where('statut', 'en_attente')->count();
        $interventionsPlanifiees = Intervention::where('statut', 'planifiee')->count();
        $interventionsEnCours = Intervention::where('statut', 'en_cours')->count();
        $interventionsTerminees = Intervention::where('statut', 'terminee')->count();
        $interventionsAnnulees = Intervention::where('statut', 'annulee')->count();
        
        // ============================================
        // INTERVENTIONS DATE
        // ============================================
        $aujourdhui = date('Y-m-d');
        $interventionsAujourdhui = Intervention::whereDate('date_heure', $aujourdhui)->count();
        $interventionsSemaine = Intervention::whereBetween('date_heure', [date('Y-m-d'), date('Y-m-d', strtotime('+7 days'))])->count();
        
        // ============================================
        // TAUX DE RÉUSSITE
        // ============================================
        $tauxReussite = $totalInterventions > 0 ? round(($interventionsTerminees / $totalInterventions) * 100) : 0;
        
        // ============================================
        // INTERVENTIONS PAR PRIORITÉ
        // ============================================
        $urgentes = Intervention::where('priorite', 'urgente')->count();
        $hautes = Intervention::where('priorite', 'haute')->count();
        $moyennes = Intervention::where('priorite', 'moyenne')->count();
        $basses = Intervention::where('priorite', 'basse')->count();
        
        // ============================================
        // GRAPHIQUE MENSUEL
        // ============================================
        $moisLabels = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];
        $moisData = array_fill(0, 12, 0);
        
        $interventionsParMois = Intervention::select(
    DB::raw('MONTH(created_at) as mois'),
    DB::raw('COUNT(*) as total')
)
->whereYear('created_at', date('Y'))
->groupBy('mois')
->orderBy('mois')
->get();
        
        foreach ($interventionsParMois as $item) {
            $moisData[(int)$item->mois - 1] = $item->total;
        }
        
        // ============================================
        // SECTEURS D'ACTIVITÉ
        // ============================================
        $secteurs = [
            ['nom' => 'Plomberie', 'pourcentage' => 65],
            ['nom' => 'Électricité', 'pourcentage' => 20],
            ['nom' => 'Maintenance', 'pourcentage' => 15],
        ];
        
        // ============================================
        // ACTIVITÉS RÉCENTES
        // ============================================
        $activitesRecentes = [
            ['icon' => 'task_alt', 'message' => 'Intervention #124 terminée', 'client' => 'Validée par Marc L.', 'date' => 'Il y a 10 min'],
            ['icon' => 'person_add', 'message' => 'Nouveau client ajouté', 'client' => 'SCI Dupond', 'date' => 'Il y a 45 min'],
            ['icon' => 'local_shipping', 'message' => 'Julie en route pour #125', 'client' => 'Technicienne affectée', 'date' => 'Il y a 1h'],
            ['icon' => 'report', 'message' => 'Alerte retard', 'client' => 'Intervention #121 en retard', 'date' => 'Il y a 2h'],
        ];
        
        // ============================================
        // DERNIÈRES INTERVENTIONS
        // ============================================
        $dernieresInterventions = Intervention::with(['client', 'technicien'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // ============================================
        // TOP TECHNICIENS
        // ============================================
        $topTechniciens = Technicien::withCount('interventions')
            ->orderBy('interventions_count', 'desc')
            ->take(3)
            ->get();
        
        // ============================================
        // RAPPORTS EN ATTENTE
        // ============================================
        $rapportsEnAttente = Rapport::where('valide', false)->count();

        $rapportsEnAttente    = Rapport::where('valide', false)->count();

// ↓ AJOUTER CES LIGNES ↓
$notificationsNonLues = \DB::table('notifications')
                           ->where('user_id', auth()->id())
                           ->where('lue', false)
                           ->count();

        
        // ============================================
        // RETOUR VUE
        // ============================================
        return view('dashboard.index', compact(
            'totalInterventions',
            'totalClients',
            'totalTechniciens',
            'interventionsEnAttente',
            'interventionsPlanifiees',
            'interventionsEnCours',
            'interventionsTerminees',
            'interventionsAnnulees',
            'interventionsAujourdhui',
            'interventionsSemaine',
            'tauxReussite',
            'urgentes',
            'hautes',
            'moyennes',
            'basses',
            'moisLabels',
            'moisData',
            'secteurs',
            'activitesRecentes',
            'dernieresInterventions',
            'topTechniciens',
            'rapportsEnAttente',
            'notificationsNonLues'
        ));

        // Nombre de notifications non lues
$notificationsNonLues = Notification::where('user_id', Auth::id())
    ->where('lue', false)
    ->count();
    }
}
