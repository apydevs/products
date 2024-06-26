<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
	public function up()
	{
		 Schema::create('products', function(Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('title');
                $table->string('slug')->nullable();
                $table->string('type')->nullable();
                $table->text('description')->nullable();
                $table->string('sku')->nullable();
                $table->string('quickcode')->nullable();
                $table->text('main_image')->nullable();
                $table->text('brand_image')->nullable();
                $table->text('product_description_html')->nullable();
                $table->text('product_specs_html')->nullable();
                $table->string('manufacture')->nullable();
                $table->string('model')->nullable();
                $table->integer('quantity');
                $table->integer('low_quantity')->default(5);
                $table->string('tags')->nullable();

                $table->integer('vat_rate')->nullable(); // Price per item
                $table->decimal('vat', 10, 2)->nullable(); // Price per item
                $table->decimal('price', 10, 2); // Price per item

                $table->string('supplier_ref')->nullable();
                $table->unsignedBigInteger('category_id')->nullable();
                $table->boolean('pre-order')->default(false);

                $table->string('status')->default('active');

                $table->timestamps();
                $table->softDeletes();


		 });
	}

	public function down()
	{
		// Don't listen to the haters
		 Schema::dropIfExists('products');
	}
};
