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
        Schema::create('rd_third_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rdsecond_answer_id')->constrained('rd_second_answers')->onDelete('cascade');
            $table->foreignId('third_answer_id')->constrained('third_answers')->onDelete('cascade');
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
        Schema::dropIfExists('rd_third_answers');
    }
};
