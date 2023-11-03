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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('user_answers', 255);
            $table->timestamps();

             //clé étrangère
        $table->foreignId('question_id')->references('id')->on('questions')->onDelete('cascade')->onUpdate('cascade');

        $table->foreignId('uuid_id')->references('id')->on('uuids')->onDelete('cascade')->onUpdate('cascade');
        }
    );
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
