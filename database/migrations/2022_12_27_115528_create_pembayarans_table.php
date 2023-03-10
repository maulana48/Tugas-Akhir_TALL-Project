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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('entity_name')->default('pembayaran');
            $table->bigInteger('pemesanan_id');
            $table->integer('no_pembayaran');
            $table->decimal('total_biaya', 15, 2);
            $table->decimal('jumlah_yang_dibayar', 15, 2);
            $table->string('metode');
            $table->string('status');
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
        Schema::dropIfExists('pembayarans');
    }
};
