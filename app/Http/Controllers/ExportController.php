<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use App\Models\Intervention;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    public function rapportPDF(Rapport $rapport)
    {
        if (Auth::user()->role === 'technicien' && $rapport->intervention->technicien_id !== Auth::id()) {
            abort(403, 'Non autorisé');
        }
        
        $rapport->load('intervention.client', 'intervention.technicien');
        
        $pdf = Pdf::loadView('exports.rapport', compact('rapport'));
        
        return $pdf->download('rapport_' . $rapport->intervention->numero . '.pdf');
    }

    public function interventionPDF(Intervention $intervention)
    {
        if (Auth::user()->role === 'technicien' && $intervention->technicien_id !== Auth::id()) {
            abort(403, 'Non autorisé');
        }
        
        $intervention->load('client', 'technicien', 'rapport');
        
        $pdf = Pdf::loadView('exports.intervention', compact('intervention'));
        
        return $pdf->download('intervention_' . $intervention->numero . '.pdf');
    }

    public function rapportListePDF()
    {
        if (Auth::user()->role === 'technicien') {
            abort(403, 'Non autorisé');
        }
        
        $rapports = Rapport::with('intervention.client')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $pdf = Pdf::loadView('exports.rapports-liste', compact('rapports'));
        
        return $pdf->download('tous-les-rapports.pdf');
    }
}
