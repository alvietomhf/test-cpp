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
        Schema::create('pg_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pjbl_group_id')->constrained('pjbl_groups')->onDelete('cascade');
            $table->foreignId('pjbl_phase_id')->constrained('pjbl_phases')->onDelete('cascade');
            $table->string('file')->nullable();
            $table->enum('status', ['unlock', 'lock'])->default('lock');
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
        Schema::dropIfExists('pg_works');
    }
};
