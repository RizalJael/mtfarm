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
        Schema::create('populasis', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->string('jenis');
            $table->string('jkel');
            $table->string('kode')->unique();
            $table->string('induk')->nullable();;
            $table->string('sumber');
            $table->string('asal')->nullable();;
            $table->string('keterangan')->nullable();
            $table->string('status');
            $table->timestamps();

            // Foreign key ke tabel supliers
            $table->foreign('asal')->references('nama')->on('supliers')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('populasis');
    }
};
