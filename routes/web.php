<?php

use App\Http\Controllers\Admin\ArrangementController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\FormateurController;
use App\Http\Controllers\Admin\FormationController as AdminFormationController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\SeminarController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Participant\DashboardController;
use App\Http\Controllers\Participant\FormationController;
use App\Http\Controllers\Participant\PaymentController;
use App\Http\Controllers\EliteTrainingController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SeminarPublicController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CallCenterController;
use App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController;
use App\Http\Controllers\CallCenter\CallCenterAgentWorkflowController;
use App\Http\Controllers\CallCenter\CallCenterPartenaireWorkflowController;

Route::prefix('call-center')->name('callcenter.')->group(function () {
    Route::get('/', [CallCenterController::class, 'index'])->name('index');
    Route::get('/about', [CallCenterController::class, 'about'])->name('about');
    Route::get('/services', [CallCenterController::class, 'services'])->name('services');
    
    // Sectors
    Route::get('/secteurs/energie', [CallCenterController::class, 'energie'])->name('secteurs.energie');
    Route::get('/secteurs/assurance', [CallCenterController::class, 'assurance'])->name('secteurs.assurance');
    Route::get('/secteurs/technologie', [CallCenterController::class, 'technologie'])->name('secteurs.technologie');
    
    Route::get('/support', [CallCenterController::class, 'support'])->name('support');
    Route::get('/blog', [CallCenterController::class, 'blog'])->name('blog');
    Route::get('/contact', [CallCenterController::class, 'contact'])->name('contact');
    Route::post('/contact', [CallCenterController::class, 'storeContact'])->middleware('throttle:5,1')->name('contact.store');

    // Workflow Call Center (Authentifié & Rôles)
    Route::middleware(['auth'])->group(function () {
        // Espace Admin Call Center
        Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
            Route::get('/dashboard', [CallCenterAdminWorkflowController::class, 'index'])->name('dashboard');
            Route::post('/rendez-vous/{rendezVous}/assign', [CallCenterAdminWorkflowController::class, 'assignPartner'])->name('assign');
            Route::post('/rendez-vous/{rendezVous}/status', [CallCenterAdminWorkflowController::class, 'updateStatus'])->name('status');
            Route::get('/users', [CallCenterAdminWorkflowController::class, 'users'])->name('users');
            Route::post('/users', [CallCenterAdminWorkflowController::class, 'storeUser'])->name('users.store');
            Route::post('/request/{id}/status', [CallCenterAdminWorkflowController::class, 'updateRequestStatus'])->name('request.status');
            Route::delete('/request/{id}', [CallCenterAdminWorkflowController::class, 'destroyRequest'])->name('request.destroy');
        });

        // Espace Agent Call Center
        Route::middleware(['role:callcenter_agent,admin'])->prefix('agent')->name('agent.')->group(function () {
            Route::get('/rendez-vous', [CallCenterAgentWorkflowController::class, 'index'])->name('index');
            Route::post('/rendez-vous', [CallCenterAgentWorkflowController::class, 'store'])->name('store');
            Route::get('/rendez-vous/{rendezVous}', [CallCenterAgentWorkflowController::class, 'show'])->name('show');
        });

        // Export Agenda .ics pour Google / Outlook / iCal (Agent, Partenaire, Admin)
        Route::get('/rendez-vous/{rendezVous}/ics', [CallCenterAgentWorkflowController::class, 'exportIcs'])->name('ics');

        // Espace Partenaire Call Center
        Route::middleware(['role:callcenter_partenaire,admin'])->prefix('partenaire')->name('partenaire.')->group(function () {
            Route::get('/rendez-vous', [CallCenterPartenaireWorkflowController::class, 'index'])->name('index');
            Route::get('/rendez-vous/{rendezVous}/qualify', [CallCenterPartenaireWorkflowController::class, 'showQualifyForm'])->name('qualify');
            Route::post('/rendez-vous/{rendezVous}/qualify', [CallCenterPartenaireWorkflowController::class, 'storeQualification'])->name('qualify.store');
        });
    });
});

/*
|--------------------------------------------------------------------------
| A — Accès public : page d'accueil + détails séminaire
|--------------------------------------------------------------------------
*/
Route::get('/', [SeminarPublicController::class, 'index'])->name('home');
Route::get('/ancien-accueil', function () {
    $seminars = \App\Models\Seminar::where('status', 'published')
        ->withCount('registrations')
        ->with('trainers')
        ->orderBy('start_date')
        ->get();
    return view('welcome_old', compact('seminars'));
})->name('home.old');

Route::get('/elite-training', [EliteTrainingController::class, 'index'])->name('elite.training');
Route::get('/elite-training/services', [EliteTrainingController::class, 'services'])->name('elite.services');
Route::get('/elite-training/programme', [EliteTrainingController::class, 'programme'])->name('elite.programme');
Route::get('/elite-training/nos-cycles', [EliteTrainingController::class, 'nosCycles'])->name('elite.nos-cycles');
Route::get('/elite-training/domaine/{slug}', [EliteTrainingController::class, 'domain'])->name('elite.training.domain');

Route::get('/elite-training/diplome/mini-mba', [EliteTrainingController::class, 'diplomaMiniMBA'])->name('elite.training.diploma.mini-mba');
Route::get('/elite-training/diplome/executive-mba', [EliteTrainingController::class, 'diplomaExecutiveMBA'])->name('elite.training.diploma.executive-mba');
Route::get('/elite-training/diplome/doctorat', [EliteTrainingController::class, 'diplomaDoctorat'])->name('elite.training.diploma.doctorat');

Route::post('/elite-training/appointment', [\App\Http\Controllers\EliteAppointmentController::class, 'store'])->name('elite.appointment.store');

Route::get('/digital-moov', function () {
    return view('digitalmoov.index');
})->name('digitalmoov');

Route::get('/digital-moov/about', function () {
    return view('digitalmoov.about');
})->name('digitalmoov.about');

Route::get('/digital-moov/services', function () {
    return view('digitalmoov.services');
})->name('digitalmoov.services');

Route::get('/digital-moov/projects', function () {
    return view('digitalmoov.projects');
})->name('digitalmoov.projects');

Route::get('/digital-moov/reference', function () {
    return view('digitalmoov.reference');
})->name('digitalmoov.reference');

Route::get('/digital-moov/contact', function () {
    return view('digitalmoov.contact');
})->name('digitalmoov.contact');

Route::get('/digital-moov/privacy-policy', function () {
    return view('digitalmoov.privacy');
})->name('digitalmoov.privacy');

Route::get('/digital-moov/sitemap', function () {
    return view('digitalmoov.sitemap');
})->name('digitalmoov.sitemap');

Route::get('/digital-moov/terms', function () {
    return view('digitalmoov.terms');
})->name('digitalmoov.terms');

Route::get('/digital-moov/blog', function () {
    return view('digitalmoov.blog');
})->name('digitalmoov.blog');

Route::get('/digital-moov/blog.html', function () {
    return redirect()->route('digitalmoov.blog');
});

Route::get('/digital-moov/service-details', function () {
    return view('digitalmoov.service-details');
})->name('digitalmoov.service-details');

Route::get('/digital-moov/service-details.html', function () {
    return redirect()->route('digitalmoov.service-details');
});

Route::get('/digital-moov/editorial', function () {
    return view('digitalmoov.editorial');
})->name('digitalmoov.editorial');

Route::get('/digital-moov/editorial.html', function () {
    return redirect()->route('digitalmoov.editorial');
});

Route::get('/digital-moov/strategie', function () {
    return view('digitalmoov.strategie');
})->name('digitalmoov.strategie');

Route::get('/digital-moov/stratégie.html', function () {
    return redirect()->route('digitalmoov.strategie');
});

Route::get('/digital-moov/strat%C3%A9gie.html', function () {
    return redirect()->route('digitalmoov.strategie');
});

Route::get('/digital-moov/media', function () {
    return view('digitalmoov.media');
})->name('digitalmoov.media');

Route::get('/digital-moov/media.html', function () {
    return redirect()->route('digitalmoov.media');
});

Route::get('/digital-moov/audio', function () {
    return view('digitalmoov.audio');
})->name('digitalmoov.audio');

Route::get('/digital-moov/Audio.html', function () {
    return redirect()->route('digitalmoov.audio');
});

Route::get('/digital-moov/prospection', function () {
    return view('digitalmoov.prospection');
})->name('digitalmoov.prospection');

Route::get('/digital-moov/prospection.html', function () {
    return redirect()->route('digitalmoov.prospection');
});

Route::get('/digital-moov/emailing', function () {
    return view('digitalmoov.emailing');
})->name('digitalmoov.emailing');

Route::get('/digital-moov/blog-details', function () {
    return view('digitalmoov.blog-details');
})->name('digitalmoov.blog-details');

Route::get('/digital-moov/blog-details-2', function () {
    return view('digitalmoov.blog-details-2');
})->name('digitalmoov.blog-details-2');

Route::get('/digital-moov/blog-details-3', function () {
    return view('digitalmoov.blog-details-3');
})->name('digitalmoov.blog-details-3');

Route::get('/digital-moov/blog-details.html', function () {
    return redirect()->route('digitalmoov.blog-details');
});

Route::get('/blog-details.html', function () {
    return redirect()->route('digitalmoov.blog-details');
});

Route::get('/digital-moov/Compagnes E-mailing.html', function () {
    return redirect()->route('digitalmoov.emailing');
});

Route::get('/digital-moov/Compagnes%20E-mailing.html', function () {
    return redirect()->route('digitalmoov.emailing');
});

Route::get('/digital-moov/sponsor', function () {
    return view('digitalmoov.sponsor');
})->name('digitalmoov.sponsor');

Route::get('/digital-moov/sponsor.html', function () {
    return redirect()->route('digitalmoov.sponsor');
});

Route::get('/digital-moov/sea', function () {
    return view('digitalmoov.sea');
})->name('digitalmoov.sea');

Route::get('/digital-moov/SEA.html', function () {
    return redirect()->route('digitalmoov.sea');
});

Route::get('/digital-moov/connexion', function () {
    return view('digitalmoov.connexion');
})->name('digitalmoov.connexion');

Route::get('/digital-moov/connexion.html', function () {
    return redirect()->route('digitalmoov.connexion');
});

Route::get('/digital-moov/project-details', function () {
    return view('digitalmoov.project-details');
})->name('digitalmoov.project-details');

Route::get('/digital-moov/project-details.html', function () {
    return redirect()->route('digitalmoov.project-details');
});

Route::get('/plateforme', [SeminarPublicController::class, 'index'])->name('plateforme');
Route::get('/medical-services', [\App\Http\Controllers\MedicalServiceController::class, 'index'])->name('medical.services');
Route::post('/medical-services/devis', [\App\Http\Controllers\MedicalServiceController::class, 'storeRequest'])->name('medical.services.request');
Route::get('/seminaires/{seminar}', [SeminarPublicController::class, 'show'])->name('seminaires.show');

/*
|--------------------------------------------------------------------------
| Espace Cliniques Partenaires — Connexion dédiée
|--------------------------------------------------------------------------
*/
Route::get('/cliniques/connexion', function () {
    if (auth()->check() && auth()->user()->role === 'clinic') {
        return redirect()->route('clinic.dashboard');
    }
    return view('clinic.login');
})->name('clinic.login');

Route::post('/cliniques/connexion', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    if (auth()->attempt($credentials) && auth()->user()->role === 'clinic') {
        $request->session()->regenerate();
        return redirect()->route('clinic.dashboard');
    }

    // Si l'utilisateur existe mais n'est pas clinic, déconnecter
    if (auth()->check() && auth()->user()->role !== 'clinic') {
        auth()->logout();
    }

    return back()->withErrors(['email' => 'Identifiants incorrects ou accès non autorisé.'])->withInput();
})->name('clinic.login.post');

Route::post('/cliniques/deconnexion', function (\Illuminate\Http\Request $request) {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('clinic.login');
})->name('clinic.logout');

// Espace clinique (authéntifié + rôle clinic)
Route::middleware(['auth', 'role:clinic'])->prefix('cliniques/espace')->name('clinic.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Clinic\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/patients', [\App\Http\Controllers\Clinic\PatientController::class, 'index'])->name('patients.index');
    Route::get('/patients/{id}', [\App\Http\Controllers\Clinic\PatientController::class, 'show'])->name('patients.show');
    Route::put('/patients/{id}/statut', [\App\Http\Controllers\Clinic\PatientController::class, 'updateStatus'])->name('patients.status');
    Route::post('/patients/{id}/devis', [\App\Http\Controllers\Clinic\PatientController::class, 'sendDevis'])->name('patients.devis');
});

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

    // --- Paiement ---
    Route::get('/inscriptions/{registration}/paiement', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/inscriptions/{registration}/paiement/arrangement', [PaymentController::class, 'storeArrangement'])->name('payment.arrangement.store');
    Route::post('/inscriptions/{registration}/paiement/orange-money', [PaymentController::class, 'storeOrangeMoney'])->name('payment.orange-money.store');
    Route::post('/inscriptions/{registration}/paiement/virement', [PaymentController::class, 'storeTransfer'])->name('payment.transfer.store');
    Route::post('/inscriptions/{registration}/paiement/visa', [PaymentController::class, 'storeVisa'])->name('payment.visa.store');
    Route::get('/inscriptions/{registration}/paiement/visa/succes', [PaymentController::class, 'stripeSuccess'])->name('payment.stripe.success');
    Route::get('/inscriptions/{registration}/paiement/visa/annulation', [PaymentController::class, 'stripeCancel'])->name('payment.stripe.cancel');
    Route::get('/inscriptions/{registration}/paiement/document/{type}', [PaymentController::class, 'downloadDocument'])->name('payment.document.download');
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
    
    // Call Center Requests & Dashboard Unifié
    Route::get('/callcenter-requests', [\App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController::class, 'index'])->name('callcenter.index');
    Route::get('/callcenter-dashboard', [\App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController::class, 'index'])->name('callcenter.dashboard');
    Route::post('/callcenter-assign/{rendezVous}', [\App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController::class, 'assignPartner'])->name('callcenter.assign');
    Route::post('/callcenter-status/{rendezVous}', [\App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController::class, 'updateStatus'])->name('callcenter.status');
    Route::post('/callcenter-request-status/{id}', [\App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController::class, 'updateRequestStatus'])->name('callcenter.request.status');
    Route::delete('/callcenter-request/{id}', [\App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController::class, 'destroyRequest'])->name('callcenter.request.destroy');
    Route::get('/callcenter-users', [\App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController::class, 'users'])->name('callcenter.users');
    Route::post('/callcenter-users', [\App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController::class, 'storeUser'])->name('callcenter.users.store');
    Route::get('/callcenter-export/excel', [\App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController::class, 'exportExcel'])->name('callcenter.export.excel');
    Route::get('/callcenter-export/pdf', [\App\Http\Controllers\CallCenter\CallCenterAdminWorkflowController::class, 'exportPdf'])->name('callcenter.export.pdf');

    Route::resource('seminaires', SeminarController::class)
        ->parameters(['seminaires' => 'seminar'])
        ->names('seminars')
        ->except(['show']);


    Route::get('/participants', [ParticipantController::class, 'index'])->name('participants.index');
    Route::get('/participants/export/excel', [ParticipantController::class, 'exportExcel'])->name('participants.export.excel');
    Route::get('/participants/export/pdf', [ParticipantController::class, 'exportPdf'])->name('participants.export.pdf');
    Route::get('/participants/{participant}', [ParticipantController::class, 'show'])->name('participants.show');
    Route::get('/participants/{participant}/edit', [ParticipantController::class, 'edit'])->name('participants.edit');
    Route::put('/participants/{participant}', [ParticipantController::class, 'update'])->name('participants.update');
    Route::delete('/participants/{participant}', [ParticipantController::class, 'destroy'])->name('participants.destroy');

    Route::get('/seminaires/{seminar}/contenus', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/seminaires/{seminar}/contenus', [DocumentController::class, 'store'])->name('documents.store');
    Route::delete('/seminaires/{seminar}/contenus/{documentId}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    Route::get('/statistiques', [StatisticsController::class, 'index'])->name('statistics.index');

    Route::resource('formateurs', FormateurController::class)
        ->parameters(['formateurs' => 'formateur']);

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');

    // --- Arrangements / Paiements ---
    Route::get('/arrangements', [ArrangementController::class, 'index'])->name('arrangements.index');
    Route::post('/arrangements/{payment}/approve', [ArrangementController::class, 'approve'])->name('arrangements.approve');
    Route::post('/arrangements/{payment}/reject', [ArrangementController::class, 'reject'])->name('arrangements.reject');
    Route::post('/arrangements/{payment}/note', [ArrangementController::class, 'addNote'])->name('arrangements.note');
    Route::get('/arrangements/{payment}/document/{type}', [ArrangementController::class, 'downloadDocument'])->name('arrangements.document');
    Route::get('/arrangements/{payment}/justificatif', [ArrangementController::class, 'downloadJustificatif'])->name('arrangements.justificatif');

    // --- Paramètres bancaires ---
    Route::get('/bank-settings', [\App\Http\Controllers\Admin\BankSettingController::class, 'edit'])->name('bank-settings.edit');
    Route::put('/bank-settings', [\App\Http\Controllers\Admin\BankSettingController::class, 'update'])->name('bank-settings.update');

    // --- Devis Médicaux CAEI Medical Center ---
    Route::get('/devis-medicaux', [\App\Http\Controllers\Admin\MedicalRequestController::class, 'index'])->name('medical-requests.index');
    Route::put('/devis-medicaux/{medicalRequest}', [\App\Http\Controllers\Admin\MedicalRequestController::class, 'updateStatus'])->name('medical-requests.update-status');
    Route::put('/devis-medicaux/{medicalRequest}/affecter', [\App\Http\Controllers\Admin\MedicalRequestController::class, 'assignPartner'])->name('medical-requests.assign-partner');
    Route::delete('/devis-medicaux/{medicalRequest}', [\App\Http\Controllers\Admin\MedicalRequestController::class, 'destroy'])->name('medical-requests.destroy');

    // --- Cliniques Partenaires ---
    Route::get('/cliniques', [\App\Http\Controllers\Admin\ClinicPartnerController::class, 'index'])->name('cliniques.index');
    Route::get('/cliniques/creer', [\App\Http\Controllers\Admin\ClinicPartnerController::class, 'create'])->name('cliniques.create');
    Route::post('/cliniques', [\App\Http\Controllers\Admin\ClinicPartnerController::class, 'store'])->name('cliniques.store');
    Route::get('/cliniques/{clinique}', [\App\Http\Controllers\Admin\ClinicPartnerController::class, 'show'])->name('cliniques.show');
    Route::post('/cliniques/{clinique}/reset-password', [\App\Http\Controllers\Admin\ClinicPartnerController::class, 'resetPassword'])->name('cliniques.reset-password');
    Route::post('/cliniques/{clinique}/toggle-active', [\App\Http\Controllers\Admin\ClinicPartnerController::class, 'toggleActive'])->name('cliniques.toggle-active');
    Route::delete('/cliniques/{clinique}', [\App\Http\Controllers\Admin\ClinicPartnerController::class, 'destroy'])->name('cliniques.destroy');


    // --- Contacts Digital Moov ---
    Route::get('/digital-moov', [\App\Http\Controllers\Admin\DigitalMoovController::class, 'index'])->name('digitalmoov.index');
    Route::put('/digital-moov/{contact}', [\App\Http\Controllers\Admin\DigitalMoovController::class, 'updateStatus'])->name('digitalmoov.update-status');
    Route::delete('/digital-moov/{contact}', [\App\Http\Controllers\Admin\DigitalMoovController::class, 'destroy'])->name('digitalmoov.destroy');

    // --- Rendez-vous Elite Training ---
    Route::get('/elite-training', [\App\Http\Controllers\Admin\EliteTrainingController::class, 'index'])->name('elite-training.index');
    Route::put('/elite-training/{appointment}', [\App\Http\Controllers\Admin\EliteTrainingController::class, 'updateStatus'])->name('elite-training.update-status');
    Route::delete('/elite-training/{appointment}', [\App\Http\Controllers\Admin\EliteTrainingController::class, 'destroy'])->name('elite-training.destroy');

    // --- Formations Elite Training (Catalogue CRUD) ---
    Route::resource('formations', AdminFormationController::class);

    // --- Recrutements ---
    Route::get('/recrutements', [\App\Http\Controllers\Admin\RecrutementController::class, 'index'])->name('recrutements.index');
    Route::get('/recrutements/{id}/cv', [\App\Http\Controllers\Admin\RecrutementController::class, 'downloadCv'])->name('recrutements.cv');
    Route::delete('/recrutements/{id}', [\App\Http\Controllers\Admin\RecrutementController::class, 'destroy'])->name('recrutements.destroy');
});

// --- Recrutement ---
use App\Http\Controllers\RecrutementController;
Route::get('/recrutement', [RecrutementController::class, 'create'])->name('recrutement.index');
Route::post('/recrutement', [RecrutementController::class, 'store'])->name('recrutement.store');

require __DIR__.'/auth.php';

Route::post('/stripe/webhook', [\App\Http\Controllers\StripePaymentController::class, 'handleWebhook'])->name('stripe.webhook');

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'subject' => 'nullable|string|max:255',
        'phone'   => 'nullable|string|max:50',
        'message' => 'required|string',
    ]);

    // Sauvegarder en base de données
    \App\Models\DigitalMoovContact::create([
        'name'    => $validated['name'],
        'email'   => $validated['email'],
        'phone'   => $request->input('phone'),
        'subject' => $request->input('subject', 'Contact Digital Moov'),
        'message' => $validated['message'],
        'source'  => $request->input('source', 'digital_moov'),
    ]);

    // Envoi d'email désactivé à la demande du client
    // Les messages sont sauvegardés en base de données et accessibles depuis le panneau d'administration

    return response()->json(['status' => 'success']);
})->name('contact.send');

