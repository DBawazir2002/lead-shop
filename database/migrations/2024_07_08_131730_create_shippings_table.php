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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['pending','progressing','shipped','delivered'])->default('pending');
            $table->string('track_number')->nullable();
            $table->date('arrival_time');
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->unsignedBigInteger('shipping_provider_id');
            $table->foreign('shipping_provider_id')
                  ->references('id')
                  ->on('shipping_providers')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('shipping_method_id');
            $table->foreign('shipping_method_id')
                ->references('id')
                ->on('shipping_methods')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
