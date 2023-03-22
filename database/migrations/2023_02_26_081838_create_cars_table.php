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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('car_make_id');
            $table->unsignedBigInteger('car_model_id');
            $table->unsignedBigInteger('fuel_type_id')->nullable();
            $table->unsignedBigInteger('auction_source')->default(1);
            $table->string('transmission')->nullable();
            $table->unsignedBigInteger('body_type_id')->nullable();
            $table->string('mileage')->nullable();
            $table->unsignedBigInteger('equipment_id')->nullable();
            $table->string('colour');
            $table->string('power_hp')->nullable();
            $table->string('power_kw')->nullable();
            $table->string('co2_emission')->nullable();
            $table->unsignedBigInteger('damage_id');
            $table->string('emission_standard')->nullable();
            $table->unsignedBigInteger('auction_type_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->tinyInteger('x-time')->default(1);
            $table->tinyInteger('vat-regime')->default(1);
            $table->string('first_registration')->nullable();
            $table->string('engine_size')->nullable();
            $table->string('price');
            $table->unsignedBigInteger('media_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
