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
        Schema::create('pjbl_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clas_id')->constrained('clas')->onDelete('cascade');
            $table->foreignId('pjbl_question_id')->constrained('pjbl_questions')->onDelete('cascade');
            $table->string('name');
            $table->integer('max_member');
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
        Schema::dropIfExists('pjbl_groups');
    }
};
