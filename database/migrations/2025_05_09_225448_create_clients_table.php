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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('phone_number');
            $table->string('address');
            $table->string('coordinate_in_map')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('description')->nullable();
            $table->enum('work_type', ['freelancer', 'full_time', 'part_time', 'contract'])->default('freelancer');
            $table->boolean('is_client')->default(false);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_remote')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
