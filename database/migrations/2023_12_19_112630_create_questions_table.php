<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('questions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('exam_id');
        $table->text('content');
        $table->enum('type', ['multiple_choice', 'single_choice', 'text_answer']);
        // Ajoutez d'autres colonnes selon vos besoins
        $table->timestamps();

        $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
