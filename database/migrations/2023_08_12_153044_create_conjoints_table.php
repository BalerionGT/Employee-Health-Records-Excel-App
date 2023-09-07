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
        Schema::create('conjoints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_User');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->date('date_naissance');
            $table->string('code_assurance');
            $table->date('date_debut_adherence');
            $table->date('date_fin_adherence');
            $table->boolean('validation');
            $table->boolean('affil');
			$table->foreign('id_User')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conjoints');
    }
};
