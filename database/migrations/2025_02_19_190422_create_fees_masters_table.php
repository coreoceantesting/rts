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
        Schema::create('fees_masters', function (Blueprint $table) {
            $table->id();
            $table->foreignid('service_name_id')->constrained()->onDelete('cascade');
            // $table->String('dep_service_id')->nullable();
            $table->Integer('fees')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_masters');
    }
};
