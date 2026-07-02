<?php

use App\Models\Registration;
use App\Models\Seminar;
use App\Models\User;

test('participant can register for a seminar and access their space', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $seminar = Seminar::create([
        'theme' => 'Formation CAEI 2026',
        'country' => 'Tunisie',
        'description' => 'Séminaire de test',
        'start_date' => now()->addDay(),
        'end_date' => now()->addDays(2),
        'status' => 'published',
        'created_by' => $admin->id,
    ]);

    $response = $this->post('/inscription', [
        'first_name' => 'Alice',
        'last_name' => 'Durand',
        'institution' => 'CAEI',
        'email' => 'alice@example.com',
        'phone' => '0123456789',
        'seminar_id' => $seminar->id,
    ]);

    $user = User::where('email', 'alice@example.com')->first();
    $registration = Registration::where('user_id', $user?->id)
        ->where('seminar_id', $seminar->id)
        ->first();

    $response->assertRedirect(route('registration.confirmation', $registration));
    $this->assertNotNull($user);
    $this->assertTrue($user->isParticipant());
    $this->assertNotNull($registration);
    $this->assertNotNull($registration->qrCode);

    $spaceResponse = $this->actingAs($user)->get('/espace');

    $spaceResponse->assertOk();
    $spaceResponse->assertSee('Mon espace participant');
    $spaceResponse->assertSee($seminar->theme);
});
