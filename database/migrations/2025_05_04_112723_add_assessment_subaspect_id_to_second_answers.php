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
        Schema::table('second_answers', function (Blueprint $table) {
            $table->foreignId('assessment_subaspect_id')->nullable()->after('first_answer_id')->constrained('assessment_subaspects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('second_answers', function (Blueprint $table) {
            $table->dropConstrainedForeignId('assessment_subaspect_id');
        });
    }
};
