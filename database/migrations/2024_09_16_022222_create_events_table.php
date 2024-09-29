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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organizer_id');
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->string('tag');
            $table->text('deskripsi');
            $table->datetime('awal_vote');
            $table->datetime('akhir_vote');
            $table->decimal('harga_vote', 2);
            $table->string('venue');
            $table->string('lokasi');
            $table->string('link');
            $table->date('tanggal_acara');
            $table->time('waktu_awal');
            $table->time('waktu_akhir')->nullable();
            $table->timestamps();

            $table->foreign('organizer_id')->references('id')->on('organizers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
