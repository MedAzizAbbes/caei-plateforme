<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\FormateurController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\SeminarController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Participant\DashboardController;
use App\Http\Controllers\Participant\FormationController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SeminarPublicController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;




/*
|--------------------------------------------------------------------------
| A — Accès public : page d'accueil + détails séminaire
|--------------------------------------------------------------------------
*/
Route::get('/', [SeminarPublicController::class, 'index'])->name('home');
Route::get('/seminaires/{seminar}', [SeminarPublicController::class, 'show'])->name('seminaires.show');

// Lien sécurisé du QR code -> connexion automatique + redirection tableau de bord
Route::get('/p/{token}', [PortalController::class, 'show'])->name('portal.show');

/*
|--------------------------------------------------------------------------
| Inscription à un séminaire — réservé aux utilisateurs connectés
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/inscription', [RegistrationController::class, 'create'])->name('registration.create');
    Route::post('/inscription', [RegistrationController::class, 'store'])->name('registration.store');
    Route::get('/inscription/{registration}/confirmation', [RegistrationController::class, 'confirmation'])
        ->name('registration.confirmation');
});

/*
|--------------------------------------------------------------------------
| Dashboard général (Breeze)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        $totalParticipants = \App\Models\User::where('role', 'participant')->count();
        $totalRegistrations = \App\Models\Registration::count();
        $totalPresent = \App\Models\Registration::where('status', 'present')->count();
        $totalAbsent = \App\Models\Registration::where('status', 'absent')->count();
        $totalInscribedOnly = $totalRegistrations - ($totalPresent + $totalAbsent);

        $attendanceRate = $totalRegistrations > 0
            ? round(($totalPresent / $totalRegistrations) * 100, 1)
            : 0;

        $institutionsCount = \App\Models\User::where('role', 'participant')
            ->whereNotNull('institution')
            ->where('institution', '!=', '')
            ->distinct('institution')
            ->count('institution');

        $topInstitutions = \App\Models\User::where('role', 'participant')
            ->whereNotNull('institution')
            ->where('institution', '!=', '')
            ->groupBy('institution')
            ->select('institution', \DB::raw('count(*) as count'))
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        $bySeminar = \App\Models\Seminar::withCount([
            'registrations',
            'registrations as presents_count' => fn($q) => $q->where('status', 'present')
        ])
        ->orderByDesc('registrations_count')
        ->get();

        return view('dashboard', compact(
            'totalParticipants',
            'totalRegistrations',
            'totalPresent',
            'totalAbsent',
            'totalInscribedOnly',
            'attendanceRate',
            'institutionsCount',
            'topInstitutions',
            'bySeminar'
        ));
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| B — Espace participant (écrans 03-05) — nécessite une connexion
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:participant,admin'])->prefix('espace')->name('participant.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:participant,formateur,admin'])->prefix('espace')->name('participant.')->group(function () {
    Route::get('/seminaires/{seminar}/formation', [FormationController::class, 'index'])->name('formation');
    Route::get('/seminaires/{seminar}/formation/{documentId}/apercu', [FormationController::class, 'preview'])
        ->name('formation.preview');
    Route::get('/seminaires/{seminar}/formation/{documentId}/telecharger', [FormationController::class, 'download'])
        ->name('formation.download');
});

/*
|--------------------------------------------------------------------------
| Formateur — tableau de bord (écran Formateur)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:formateur'])->prefix('espace')->name('formateur.')->group(function () {
    Route::get('/formateur', [\App\Http\Controllers\Formateur\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/formateur/seminaires/{seminar}/contenus', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/formateur/seminaires/{seminar}/contenus', [DocumentController::class, 'store'])->name('documents.store');
    Route::delete('/formateur/seminaires/{seminar}/contenus/{documentId}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    
    // Gestion des présences par jour
    Route::get('/formateur/seminaires/{seminar}/presences', [\App\Http\Controllers\Formateur\AttendanceController::class, 'index'])->name('presences.index');
    Route::get('/formateur/seminaires/{seminar}/presences/scan', [\App\Http\Controllers\Formateur\AttendanceController::class, 'scan'])->name('presences.scan');
    Route::post('/formateur/seminaires/{seminar}/presences/scan', [\App\Http\Controllers\Formateur\AttendanceController::class, 'storeScan'])->name('presences.storeScan');
    Route::get('/formateur/seminaires/{seminar}/presences/export/pdf', [\App\Http\Controllers\Formateur\AttendanceController::class, 'exportPdf'])->name('presences.export.pdf');
    Route::get('/formateur/seminaires/{seminar}/presences/export/excel', [\App\Http\Controllers\Formateur\AttendanceController::class, 'exportExcel'])->name('presences.export.excel');
});

/*
|--------------------------------------------------------------------------
| Espace échange — partagé participants + formateurs (écran 05)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:participant,formateur,admin'])->group(function () {
    Route::get('/seminaires/{seminar}/echange', [MessageController::class, 'index'])->name('echange.index');
    Route::post('/seminaires/{seminar}/echange', [MessageController::class, 'store'])->name('echange.store');
});

/*
|--------------------------------------------------------------------------
| C — Contrôle de présence — formateurs + admin (écran 06)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:formateur,admin'])->prefix('checkin')->name('checkin.')->group(function () {
    Route::get('/', [AttendanceController::class, 'index'])->name('index');
    Route::post('/scan', [AttendanceController::class, 'scan'])->name('scan');
});

/*
|--------------------------------------------------------------------------
| D — Back-office CAEI — admin uniquement (écrans 07-10)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('seminaires', SeminarController::class)
        ->parameters(['seminaires' => 'seminar'])
        ->names('seminars')
        ->except(['show']);

    Route::get('/participants', [ParticipantController::class, 'index'])->name('participants.index');
    Route::get('/participants/export/excel', [ParticipantController::class, 'exportExcel'])->name('participants.export.excel');
    Route::get('/participants/export/pdf', [ParticipantController::class, 'exportPdf'])->name('participants.export.pdf');

    Route::get('/seminaires/{seminar}/contenus', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/seminaires/{seminar}/contenus', [DocumentController::class, 'store'])->name('documents.store');
    Route::delete('/seminaires/{seminar}/contenus/{documentId}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    Route::get('/statistiques', [StatisticsController::class, 'index'])->name('statistics.index');

    Route::resource('formateurs', FormateurController::class)
        ->parameters(['formateurs' => 'formateur']);
});

require __DIR__.'/auth.php';
