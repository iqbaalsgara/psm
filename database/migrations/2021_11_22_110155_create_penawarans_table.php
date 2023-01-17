<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id');
            $table->foreignId('customer_id');
            $table->foreignId('detail_customer_id');
            $table->string('attn');
            $table->string('no_penawaran_harga');
            $table->timestamp('tgl');
            $table->text('alamat_delivery');
            $table->text('keterangan');
            $table->text('nambutpenawaran');
            $table->text('delivery');
            // $table->string('atas_nama');
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
        Schema::dropIfExists('penawaran');
    }
}
