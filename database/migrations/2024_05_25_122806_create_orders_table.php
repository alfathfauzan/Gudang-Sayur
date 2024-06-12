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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('alamat_id');
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
            $table->string('status')->default('Belum Dibayar');
            

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('alamat_id')->references('id')->on('alamats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
