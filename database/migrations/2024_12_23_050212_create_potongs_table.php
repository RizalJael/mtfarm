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
        Schema::create('potongs', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->string('kode');
            $table->integer('bobot');
            $table->string('tujuan')->nullable();
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign('kode')->references('kode')->on('populasis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potongs');
    }
};