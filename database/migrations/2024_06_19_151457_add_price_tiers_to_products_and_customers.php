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
        Schema::table('products', function (Blueprint $table) {
            //price is the original price scraped
            $table->decimal('tier1', 10, 2)->nullable(); // 70 markup
            $table->decimal('tier2', 10, 2)->nullable();//  55 markup
            $table->decimal('tier3', 10, 2)->nullable(); // 45 markup
        });


        Schema::table('customers', function (Blueprint $table) {
            //price is the original price scraped
            $table->integer('price_tier')->after('price')->default(1); // customer pricing

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('tier1'); // 70 markup
            $table->dropColumn('tier2'); //  55 markup
            $table->dropColumn('tier3'); // 45 markup
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('price_tier');
        });
    }
};
