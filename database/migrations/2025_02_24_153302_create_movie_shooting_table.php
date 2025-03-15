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
        Schema::create('movie_shooting', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('ip')->nullable();
            $table->string('zone')->nullable();
            $table->string('application_no')->nullable();
            $table->integer('service_id')->nullable();
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('marathi_f_name')->nullable();
            $table->string('marathi_m_name')->nullable();
            $table->string('marathi_l_name')->nullable();
            $table->biginteger('mobile_num')->nullable();
            $table->biginteger('aadhar_num')->nullable();
            $table->string('email')->nullable();
            $table->date('aapale_sarkar_payment_date')->nullable();
            $table->date('payment_date')->nullable();
            $table->boolean('is_payment_paid_aapale_sarkar')->default(0)->nullable();
            $table->boolean('is_payment_paid')->default(0)->nullable();
            $table->string('status')->nullable();
            $table->string('address')->nullable();
            $table->string('marathi_address')->nullable();
            $table->string('purpose')->nullable();
            $table->string('marathi_purpose')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_shooting');
    }
};
