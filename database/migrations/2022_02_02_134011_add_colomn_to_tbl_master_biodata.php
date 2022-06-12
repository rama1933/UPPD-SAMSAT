<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomnToTblMasterBiodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_biodata', function (Blueprint $table) {
            //
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_master_biodata', function (Blueprint $table) {
            //
        });
    }
}
