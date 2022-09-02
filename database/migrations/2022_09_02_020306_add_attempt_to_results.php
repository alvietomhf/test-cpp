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
        Schema::table('results', function (Blueprint $table) {
            $table->integer('real_score')->default(0)->after('score');
            $table->integer('trial_reduction')->default(0)->after('real_score');
            $table->integer('attempt')->nullable()->after('passed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->dropColumn('real_score');
            $table->dropColumn('trial_reduction');
            $table->dropColumn('attempt');
        });
    }
};
