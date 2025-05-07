<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('prenom', 50);                      // First name
            $table->string('nom', 50);                         // Last name
            $table->string('nom_utilisateur', 50)->unique();   // Username
            $table->string('email', 70)->unique();             // Email
            $table->string('password', 60);                    // Password
            $table->string('telephone', 20)->nullable();       // Phone (optional)
            $table->string('cellule_preferee', 30)->nullable(); // Preferred cell (optional)
            $table->boolean('newsletter')->default(false);     // Newsletter subscription
            $table->boolean('conditions_acceptees')->default(false); // Terms acceptance
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};