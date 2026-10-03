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
    Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('kategori');
        $table->string('gambar')->nullable();
        $table->text('isi');
        $table->unsignedInteger('dilihat')->default(0);
        $table->string('penulis')->default('Admin');
        $table->timestamps();
    });
}

};
