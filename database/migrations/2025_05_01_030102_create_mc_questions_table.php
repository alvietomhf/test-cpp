<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mc_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competency_id')->constrained('competencies')->onDelete('cascade');
            $table->longText('case');
            $table->longText('question');
            $table->longText('note');
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('easy');
            $table->integer('score')->default(1);
            $table->json('image')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mc_questions');
    }
};
