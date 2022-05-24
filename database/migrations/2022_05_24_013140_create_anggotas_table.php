<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
			$table->string('No_Anggota');
			$table->string('Nama');
			$table->bigInteger('Wajib');
			$table->bigInteger('Pokok');
			$table->bigInteger('Saldo');
            $table->timestamps();
			$table->softDeletes();
			
			$table->primary('no_anggota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}
