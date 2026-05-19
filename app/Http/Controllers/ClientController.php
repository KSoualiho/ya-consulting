<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'manager') {
                abort(403, 'Seuls les admins et managers peuvent gérer les clients');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $clients = Client::orderBy('created_at', 'desc')->paginate(10);
        $totalClients = Client::count();
        $nouveauxCeMois = Client::whereMonth('created_at', date('m'))->count();
        $interventionsActives = Intervention::whereIn('statut', ['planifiee', 'en_cours'])->count();
        
        return view('clients.index', compact('clients', 'totalClients', 'nouveauxCeMois', 'interventionsActives'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'contact' => 'required|string|max:100',
            'telephone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'adresse' => 'nullable|string',
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Client ajouté avec succès');
    }

    public function edit(Client $client)
    {
        return response()->json($client);
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'contact' => 'required|string|max:100',
            'telephone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'adresse' => 'nullable|string',
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Client modifié avec succès');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')
            ->with('success', 'Client supprimé avec succès');
    }
}

