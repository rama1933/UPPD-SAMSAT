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
        Schema::create('tbl_master_profile', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->text('alamat');
            $table->text('profile');
            $table->text('tujuan');
            $table->text('visi');
            $table->text('misi');
            $table->text('moto');
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
        Schema::dropIfExists('tbl_master_profile');
    }
};
