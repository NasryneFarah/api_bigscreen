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
        Schema::create('uuids', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->timestamps();

            //clé étrangère 
            $table->foreignId('uuid_answers')->references('id')->on('answers')->onDelete('cascade')->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uuids');
    }
};
