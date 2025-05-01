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
        Schema::create('mcq_result_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcq_result_id')->constrained('mcq_results')->onDelete('cascade');
            $table->foreignId('mc_question_id')->constrained('mc_questions')->onDelete('cascade');
            $table->foreignId('option_id')->nullable()->constrained('options')->onDelete('cascade');
            $table->boolean('correct');
            $table->integer('score')->default(0);
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
        Schema::dropIfExists('mcq_result_details');
    }
};
