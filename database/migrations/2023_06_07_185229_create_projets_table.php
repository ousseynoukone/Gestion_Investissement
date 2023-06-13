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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->String('libelle');
            $table->String('description');
            $table->double('cout');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('annonce_id')->nullable()->constrained();
            $table->foreignId('investissement_id')->nullable()->constrained();

            $table->integer('statut')->default(0);
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
