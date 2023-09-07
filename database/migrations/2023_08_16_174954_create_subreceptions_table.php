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
        Schema::create('subreceptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Reception');
            $table->string('matricule');
            $table->date('date_visite');
            $table->string('adherent_nom'); // il faut savoir comment récupérer le prénom du malade à partir de la saisie du matriccule
            $table->string('adherent_prenom'); // il faut savoir comment récupérer le prénom du malade à partir de la saisie du matriccule
            $table->string('lien');
            $table->string('malade')->nullable()->default(null);
            $table->double('montant_totale')->nullable()->default(0);
            $table->double('remboursement_pevu')->nullable()->default(0);
            $table->boolean('solde');
            $table->string('observations')->nullable()->default(null);
            $table->double('montant_rembourse')->nullable()->default(0);
            $table->double('part_medecin1')->nullable()->default(0);
            $table->double('part_medecin2')->nullable()->default(0);
            $table->double('part_adherent')->nullable()->default(0);
            $table->foreign('id_Reception')->references('id')->on('receptions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subreceptions');
    }
};
