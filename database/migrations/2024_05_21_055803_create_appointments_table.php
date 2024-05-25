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
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id');
            $table->integer('client_id');
            $table->integer('employee_id');
            $table->integer('payment_id')->nullable();
            $table->string('client_name');
            $table->string('employee_name');
            $table->datetime('app_date');
            $table->datetime('app_to');
            $table->boolean('completed');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
