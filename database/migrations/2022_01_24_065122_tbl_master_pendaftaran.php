<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblMasterPendaftaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('biodata_id');
            $table->unsignedBigInteger('jenis_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('merk_id');
            $table->string('warna', 255)->nullable();
            $table->string('tahun', 4)->nullable();
            $table->date('tanggal')->nullable();
            $table->enum('status', ['0', '1', '2'])->default('0');
            $table->enum('posting', ['0', '1', '2'])->default('0');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('biodata_id')->references('id')->on('tbl_biodata')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('tbl_master_type')->onDelete('cascade');
            $table->foreign('merk_id')->references('id')->on('tbl_master_merk')->onDelete('cascade');
            $table->foreign('jenis_id')->references('id')->on('tbl_master_jenis')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_master_pendaftaran');
    }
}
