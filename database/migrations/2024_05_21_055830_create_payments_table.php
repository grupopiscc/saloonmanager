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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('payment_type_id');
            $table->foreign('user_id')->references('id')->on('clients');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->decimal('price');
            $table->integer('instalments');
            $table->boolean('paid');
            $table->datetime('date_paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
