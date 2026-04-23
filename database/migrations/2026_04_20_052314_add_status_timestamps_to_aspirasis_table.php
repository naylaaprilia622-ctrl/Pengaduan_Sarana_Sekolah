<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->timestamp('diproses_at')->nullable()->after('feedback');
            $table->timestamp('diselesaikan_at')->nullable()->after('diproses_at');
        });
    }

    public function down(): void
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->dropColumn(['diproses_at', 'diselesaikan_at']);
        });
    }
};
