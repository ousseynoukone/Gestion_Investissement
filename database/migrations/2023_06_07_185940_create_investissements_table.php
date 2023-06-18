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
        Schema::create('investissements', function (Blueprint $table) {
            $table->id();
            $table->double('montant');
            $table->integer('investisseur_id')->unsigned();
            $table->integer('entrepreneur_id')->unsigned()->nullable();
            $table->dateTime('date_investissement');
            $table->string('conditions');
            $table->float('partDeParticipation');
            $table->timestamps(); 
            $table->foreignId('projet_id')->constrained();

            $table->foreign('investisseur_id')->references('id')->on('users');
            $table->foreign('entrepreneur_id')->references('id')->on('users');
        
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investissements');
    }
};
