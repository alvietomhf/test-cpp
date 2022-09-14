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
        Schema::create('first_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('description_id')->constrained('descriptions')->onDelete('cascade');
            $table->string('detail');
            $table->integer('score')->default(0);
            $table->boolean('nested');
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
        Schema::dropIfExists('first_answers');
    }
};
