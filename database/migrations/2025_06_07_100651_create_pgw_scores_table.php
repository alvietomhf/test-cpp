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
        Schema::create('pgw_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pg_work_id')->constrained('pg_works')->onDelete('cascade');
            $table->foreignId('pg_member_id')->constrained('pg_members')->onDelete('cascade');
            $table->integer('value');
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
        Schema::dropIfExists('pgw_scores');
    }
};
