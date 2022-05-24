<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simpans', function (Blueprint $table) {
            $table->string('No_Simpan');
			$table->string('No_Anggota');
			$table->bigInteger('JmlSimpan');
			$table->string('KodeKsr');
            $table->timestamps();
			
			$table->primary('No_Simpan');
			$table->foreign('No_Anggota')->references('No_Anggota')->on('anggotas');
			$table->foreign('KodeKsr')->references('KODEKSR')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simpans');
    }
}
