<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->smallIncrements('id_kategori');
            $table->string('ket_kategori', 30);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};
