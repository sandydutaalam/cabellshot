<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->string('payment_proof_type', 255)->default('Unknown')->change();
    });
}

public function down()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->string('payment_proof_type', 255)->nullable()->change();
    });
}


};
