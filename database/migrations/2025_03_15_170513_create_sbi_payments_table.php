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
        Schema::create('sbi_payments', function (Blueprint $table) {
            $table->id();
            $table->string('orderno');
            $table->float('amount')->nullable();
            $table->bigInteger('service_id')->nullable();
            $table->bigInteger('table_id')->nullable();
            $table->bigInteger('fees_id')->nullable();
            $table->string('status')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sbi_payments');
    }
};
