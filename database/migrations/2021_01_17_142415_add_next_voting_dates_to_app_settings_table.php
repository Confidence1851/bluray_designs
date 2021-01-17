<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNextVotingDatesToAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('app_settings', 'n_vote_starts')) $table->string('n_vote_starts')->nullable(); //Next vote starts
            if (!Schema::hasColumn('app_settings', 'n_vote_ends')) $table->string('n_vote_ends')->nullable(); //Next vote starts
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_settings', function (Blueprint $table) {
            //
        });
    }
}
