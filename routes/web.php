<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ============================================
// ROUTES PUBLIQUES (non authentifiées)
// ============================================

// Authentification
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email ou mot de passe incorrect.',
    ]);
});

// Inscription
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// ============================================
// ROUTES PROTÉGÉES (authentification requise)
// ============================================

Route::middleware('auth')->group(function () {

    // ---------- DASHBOARD ----------
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // ---------- DÉCONNEXION ----------
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

    // ---------- CLIENTS ----------
    Route::middleware('role:admin,manager')->resource('clients', ClientController::class);

    // ---------- INTERVENTIONS ----------
    Route::resource('interventions', InterventionController::class);
    Route::post('/interventions/{intervention}/status', [InterventionController::class, 'updateStatus'])->name('interventions.updateStatus');

    // ---------- TECHNICIENS ----------
    Route::middleware('role:admin,manager')->resource('techniciens', TechnicienController::class);

    // ---------- RAPPORTS ----------
    Route::get('/rapports', [RapportController::class, 'index'])->name('rapports.index');
    Route::get('/rapports/create/{intervention}', [RapportController::class, 'create'])->name('rapports.create');
    Route::post('/rapports', [RapportController::class, 'store'])->name('rapports.store');
    Route::get('/rapports/{rapport}', [RapportController::class, 'show'])->name('rapports.show');
    Route::post('/rapports/{rapport}/valider', [RapportController::class, 'valider'])->name('rapports.valider');

    // ---------- PLANNING ----------
    Route::get('/planning', [PlanningController::class, 'index'])->name('planning.index');
    Route::get('/planning/events', [PlanningController::class, 'getEvents'])->name('planning.events');
    Route::get('/planning/check-conflicts', [PlanningController::class, 'checkConflicts'])->name('planning.checkConflicts');

    // ---------- NOTIFICATIONS ----------
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markRead');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllRead');
    Route::get('/notifications/unread/count', [NotificationController::class, 'getUnreadCount'])->name('notifications.unread.count');

    // ---------- STATISTIQUES ----------
    Route::middleware('role:admin,manager')->get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques.index');

    // ---------- EXPORTS ----------
    Route::get('/export/rapport/{rapport}', [ExportController::class, 'rapportPDF'])->name('export.rapport');
    Route::get('/export/intervention/{intervention}', [ExportController::class, 'interventionPDF'])->name('export.intervention');
    Route::middleware('role:admin,manager')->get('/export/rapports-liste', [ExportController::class, 'rapportListePDF'])->name('export.rapports-liste');

    // Admin - Gestion des utilisateurs (admin uniquement)
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', \App\Http\Controllers\UserController::class);
    });
});

// ============================================
// FIN DES ROUTES
// ============================================