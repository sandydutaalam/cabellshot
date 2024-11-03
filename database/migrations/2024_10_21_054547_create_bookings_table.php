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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_number')->nullable();
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('booking_date')->nullable();
            $table->foreignId('event_type_id')->constrained('event_types')->onDelete('cascade');

            // unsigned integer
            $table->unsignedBigInteger('photographer_id')->nullable();
            $table->foreign('photographer_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('number_of_guest')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('city_name')->nullable();
            $table->mediumText('message')->nullable();
            $table->string('remark')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('updation_date')->nullable()->useCurrentOnUpdate();
            $table->string('payment_proof')->nullable();
            $table->string('payment_proof_type')->nullable();
            $table->bigInteger('payment_proof_size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
