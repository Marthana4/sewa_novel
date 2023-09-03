<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->BigIncrements('id_transaksi');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('id_novel');
            $table->date('tgl_jatuh_tempo');
            $table->enum('status', ['dipinjam', 'dikembalikan']);
            $table->bigInteger('created_by')->default(0);
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->bigInteger('updated_by')->default(0);
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
            
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('id_novel')->references('id_novel')->on('novels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
