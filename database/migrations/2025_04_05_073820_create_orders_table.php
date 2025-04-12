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
            $table->string('pickup_location');
            $table->string('drop_location');
            $table->enum('delivery_type',['Food','Cargo']);
            $table->double('weight',8,2)->nullable()->default(0.00);
            $table->integer('price');
            $table->string('note');
            $table->string('phone_number')->nullable()->default(NULL);
            $table->enum('status',['Pending','Ongoing','Delivered','Deteriorations']);
            $table->string('payment_status')->nullable()->default(NULL);
            $table->timestamp('deleted_at')->nullable()->default(NULL);
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
