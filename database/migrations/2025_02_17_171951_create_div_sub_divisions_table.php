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
        Schema::create('div_sub_divisions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('ip')->nullable();
            $table->string('zone')->nullable();
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('marathi_f_name')->nullable();
            $table->string('marathi_m_name')->nullable();
            $table->string('marathi_l_name')->nullable();
            $table->biginteger('mobile_num')->nullable();
            $table->biginteger('aadhar_num')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('div_sub_divisions');
    }
};
