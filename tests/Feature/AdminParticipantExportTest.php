<?php

use App\Models\Registration;
use App\Models\Seminar;
use App\Models\User;

beforeEach(function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);
});

test('admin export pdf route returns a downloadable response', function () {
    $seminar = Seminar::create([
        'theme' => 'Séminaire export',
        'country' => 'Tunisie',
        'description' => 'Test export',
        'start_date' => now()->addDay(),
        'end_date' => now()->addDays(2),
        'status' => 'published',
        'created_by' => 1,
    ]);

    $user = User::factory()->create(['role' => 'participant']);
    Registration::create([
        'user_id' => $user->id,
        'seminar_id' => $seminar->id,
        'status' => 'inscrit',
        'registered_at' => now(),
    ]);

    $response = $this->get('/admin/participants/export/pdf');

    $response->assertOk();
    $response->assertHeader('content-disposition');
});
