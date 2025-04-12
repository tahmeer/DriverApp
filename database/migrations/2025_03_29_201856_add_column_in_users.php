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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->after('email')->nullable()->default(NULL);
            $table->string('cnic_no')->after('phone')->nullable()->default(NULL);
            $table->string('address_1')->after('cnic_no')->nullable()->default(NULL);
            $table->string('address_2')->after('address_1')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone','cnic_no','address_1','address_2']);
        });
    }
};
