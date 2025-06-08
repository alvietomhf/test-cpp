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
        Schema::table('pjbl_questions', function (Blueprint $table) {
            $table->dropIndex('pjbl_questions_competency_id_foreign');
            $table->unsignedBigInteger('competency_id')->nullable()->change();
            $table->string('custom_competency')->nullable()->after('competency_id');
            $table->foreign('competency_id')->references('id')->on('competencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pjbl_questions', function (Blueprint $table) {
            $table->dropForeign(['competency_id']);
            $table->dropColumn('custom_competency');
            $table->unsignedBigInteger('competency_id')->nullable(false)->change();
            $table->index('competency_id', 'pjbl_questions_competency_id_foreign');
        });
    }
};