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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('input_type', ['TextInput', 'Select', 'Toggle']);
            $table->string('default_value')->nullable();
            $table->enum('value_type', ['string', 'number', 'json']);
            $table->unsignedBigInteger('api_id');
            $table->timestamps();

            // $table->foreign('api_id')->references('id')->on('apis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
