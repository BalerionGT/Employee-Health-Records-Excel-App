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
        Schema::create('subenvoies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Envoie');
            $table->string('matricule');
            $table->double('montant_totale')->nullable()->default(null);
            $table->date('date_visite');
            $table->string('adherent_nom'); // il faut savoir comment récupérer le prénom du malade à partir de la saisie du matriccule
            $table->string('adherent_prenom'); // il faut savoir comment récupérer le prénom du malade à partir de la saisie du matriccule
            $table->string('lien');
            $table->string('malade')->nullable()->default(null);
            $table->double('visite')->nullable()->default(0);
            $table->double('pharmacie')->nullable()->default(0);
            $table->double('radio')->nullable()->default(0);
            $table->double('analyse')->nullable()->default(0);
            $table->double('auxiliaires')->nullable()->default(0);
            $table->double('optique')->nullable()->default(0);
            $table->double('soin_dentaires')->nullable()->default(0);
            $table->double('prothèse')->nullable()->default(0);
            $table->double('autres')->nullable()->default(0);
            $table->double('prise_en_charge')->nullable()->default(0);
            $table->string('observations')->nullable()->default(null);
            $table->boolean('solde');
            $table->foreign('id_Envoie')->references('id')->on('envoies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subenvoies');
    }
};
