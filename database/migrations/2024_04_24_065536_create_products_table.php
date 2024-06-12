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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name',255);
            $table->integer('price');
            $table->text('product_image')->default('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEis7VwK_0jjSgiwzNM0hS_W1TVtaD2GYHfOB-0XEk5PpKCmgk5gzsh_790iseMCTZyHMwi1fZeDu_U5Nae9ZzPomfcdYZnL030p7hn3sMwdcffjzUX0Q7f-sJzhiSaw4TnqHJq_l7tAHTFNgWRKiC6BL1gqnAPrQl1HgGLK82Jm1qJe8s56_DFBZT70JIr5/s320/product-2.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
