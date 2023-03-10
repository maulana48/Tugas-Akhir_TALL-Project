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
        Schema::create('product_batiks', function (Blueprint $table) {
            $table->id();
            $table->string('entity_name')->default('product_batik');
            $table->bigInteger('kategori_product_id');
            $table->string('nama');
            $table->string('merk');
            $table->decimal('harga', 9, 2);
            $table->text('deskripsi');
            $table->string('tipe_warna');
            $table->integer('stok');
            $table->string('asal_kota');
            $table->string('motif_batik');
            $table->text('media');
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
        Schema::dropIfExists('product_batiks');
    }
};
