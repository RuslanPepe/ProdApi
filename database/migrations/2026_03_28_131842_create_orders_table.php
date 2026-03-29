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

            $table->string('g_number')->index();
            $table->dateTime('date')->index();
            $table->date('last_change_date')->index();
            $table->string('supplier_article')->nullable();
            $table->string('tech_size')->nullable();
            $table->bigInteger('barcode')->nullable()->index();
            $table->decimal('total_price', 12, 2)->nullable();
            $table->integer('discount_percent')->nullable();
            $table->string('warehouse_name')->nullable()->index();
            $table->string('oblast')->nullable();
            $table->bigInteger('income_id')->nullable()->index();
            $table->string('odid')->nullable();
            $table->bigInteger('nm_id')->nullable()->index();
            $table->string('subject')->nullable();
            $table->string('category')->nullable();
            $table->string('brand')->nullable();
            $table->boolean('is_cancel')->default(false);
            $table->dateTime('cancel_dt')->nullable();
            $table->index(['date', 'warehouse_name']);
            $table->index(['nm_id', 'date']);

            $table->timestamps();
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
