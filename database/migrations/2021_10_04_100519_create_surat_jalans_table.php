<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_jalan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('detail_customer_id');
            $table->foreignId('perusahaan_id');
            $table->foreignId('user_id');
            $table->string('no_sj');
            $table->string('po');
            $table->string('pr');
            $table->enum('status',['Menunggu','Terbeli','Terkirim','Terjadwal','Invoice','Selesai','Batal']);
            $table->timestamp('tgl_input')->nullable();
            $table->timestamp('tgl_pembelian')->nullable();
            $table->timestamp('tgl_paket')->nullable();
            $table->timestamp('tgl_pengiriman')->nullable();
            $table->timestamp('tgl_invoice')->nullable();
            $table->timestamp('tgl_arsip')->nullable();
            $table->string('no_inv')->nullable();
            $table->enum('partial',['yes','no']);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('surat_jalan');
    }
}
