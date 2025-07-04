<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('representations', function (Blueprint $table) {
            $table->foreignId('event_id')->after('id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('representations', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
        });
    }
};
