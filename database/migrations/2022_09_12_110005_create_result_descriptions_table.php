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
        Schema::create('result_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('result_detail_id')->constrained('result_details')->onDelete('cascade');
            $table->foreignId('description_id')->constrained('descriptions')->onDelete('cascade');
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
        Schema::dropIfExists('result_descriptions');
    }
};
