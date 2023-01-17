<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penawaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penawaran_id');
            $table->text('nama_barang');
            $table->string('unit');
            $table->integer('qty');
            $table->decimal('harga');
            // $table->integer('diskon');
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
        Schema::dropIfExists('detail_penawaran');
    }
}
