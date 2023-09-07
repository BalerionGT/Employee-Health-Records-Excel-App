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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id')->primary;
            $table->string('nom');
            $table->string('prenom');
            $table->string('matricule');
            $table->string('departement');
            $table->string('sexe');
            $table->date('date_naissance');
            $table->date('date_recrutement');
            $table->string('situation_famille');
            $table->integer('nbre_enfant')->nullable()->default(0);
            $table->string('matricule_conjoint')->nullable()->default(0);
            $table->boolean('validation');
            $table->boolean('admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
