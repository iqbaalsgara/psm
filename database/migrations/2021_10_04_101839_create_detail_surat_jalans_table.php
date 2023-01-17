<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSuratJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_surat_jalan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_jalan_id');
            $table->foreignId('user_id')->nullable();
            $table->string('nama_barang');
            $table->decimal('harga_asli', 10,2);
            $table->decimal('harga_po', 10,2);
            $table->timestamp('tgl_beli')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('statusitem',['Menunggu','Terbeli','Terkirim','Terjadwal','Invoice','Selesai','Batal']);
            $table->string('unit');
            $table->integer('qty');
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
        Schema::dropIfExists('detail_surat_jalan');
    }
}
