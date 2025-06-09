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
        Schema::create('cowboy_pass', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cowboy_id')->constrained('cowboys')->onDelete('cascade'); // titular
            $table->foreignId('pass_id')->constrained('passes')->onDelete('cascade');
            $table->foreignId('helper_id')->nullable()->constrained('cowboys')->onDelete('cascade'); // esteira

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cowboy_pass');
    }
};
