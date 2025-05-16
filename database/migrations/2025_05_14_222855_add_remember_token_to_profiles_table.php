<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            // Vérifier si la colonne n'existe pas déjà pour éviter les erreurs
            if (!Schema::hasColumn('profiles', 'remember_token')) {
                $table->rememberToken();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            // Vérifier si la colonne existe avant de la supprimer
            if (Schema::hasColumn('profiles', 'remember_token')) {
                $table->dropColumn('remember_token');
            }
        });
    }
};
