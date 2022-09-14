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
        Schema::create('rd_first_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('result_description_id')->constrained('result_descriptions')->onDelete('cascade');
            $table->foreignId('first_answer_id')->constrained('first_answers')->onDelete('cascade');
            $table->boolean('correct')->default(0);
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
        Schema::dropIfExists('rd_first_answers');
    }
};
