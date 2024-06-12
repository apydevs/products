<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
	public function up()
	{
		 Schema::table('products', function(Blueprint $table) {

             $table->text('description')->change();
             $table->string('sku')->nullable();
             $table->string('quickcode')->nullable();
             $table->text('main_image')->nullable();
             $table->text('brand_image')->nullable();
             $table->text('product_description_html')->nullable();
             $table->text('product_specs_html')->nullable();
		 });
	}

	public function down()
	{
		// Don't listen to the haters
		 Schema::dropColumns('products',[
             'sku','quickcode','main_image','brand_image','product_description_html','product_specs_html'
         ]);
	}
};
