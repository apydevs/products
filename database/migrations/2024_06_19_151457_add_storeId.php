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
        Schema::table('customers', function (Blueprint $table) {
            //price is the original price scraped
            $table->unsignedBigInteger('team_id')->nullable(); // customers from stores
        });


        Schema::table('orders', function (Blueprint $table) {
            //price is the original price scraped
            $table->unsignedBigInteger('team_id')->nullable(); // customers from stores

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('team_id');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('team_id');
        });
    }
};
