<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = App\Models\User::find(4);
if ($user) {
    echo "Found user 4: {$user->first_name} {$user->last_name} (Role: {$user->role})\n";
    try {
        $user->seminarsAsTrainer()->detach();
        $user->delete();
        echo "Successfully deleted user 4!\n";
    } catch (\Exception $e) {
        echo "Failed to delete: " . $e->getMessage() . "\n";
    }
} else {
    echo "User 4 not found.\n";
}
