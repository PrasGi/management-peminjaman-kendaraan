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
        Schema::create('submiteds', function (Blueprint $table) {
            $table->id();
            $table->string('name_admin');
            $table->date('tanggal_peminjaman');
            $table->string('jam_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->string('jam_pengembalian');
            $table->foreignId('user_id');
            $table->foreignId('company_id');
            $table->foreignId('unit_id');
            $table->foreignId('transport_id');
            $table->foreignId('status_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('transport_id')->references('id')->on('transports');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submiteds');
    }
};
