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
                if (Schema::hasColumn('profiles', 'password_confirmation')) {
                    $table->dropColumn('password_confirmation');
                }
            });
        }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('password_confirmation', 60)->nullable();
        });
    }
};
