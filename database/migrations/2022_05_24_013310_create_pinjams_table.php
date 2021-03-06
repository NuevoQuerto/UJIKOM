<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->string('No_Pinjam');
			$table->string('No_Anggota');
			$table->bigInteger('JmlPinjam');
			$table->string('KodeKsr');
            $table->timestamps();
			
			$table->primary('No_Pinjam');
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
        Schema::dropIfExists('pinjams');
    }
}
