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
        Schema::create('inicident_custom_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('field_type');
            $table->string('field_value');
            $table->integer('inicident_id');
            $table->json('config')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inicident_custom_fields');
    }
};
