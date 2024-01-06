<?php
// database/migrations/YYYY_MM_DD_create_questions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['choix_multiple', 'choix_unique', 'reponse_texte']);
            $table->text('enonce');
            $table->json('reponse_attendue')->nullable();
            $table->integer('note');
            $table->unsignedBigInteger('epreuve_id');
            $table->timestamps();
            $table->foreign('epreuve_id')->references('id')->on('epreuves')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
