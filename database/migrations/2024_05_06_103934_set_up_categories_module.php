<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
	public function up()
	{
		 Schema::create('categories', function(Blueprint $table) {
		 	$table->bigIncrements('id');
            $table->string('name');
            $table->boolean('active');
		 	$table->timestamps();
		 	$table->softDeletes();
		 });
	}

	public function down()
	{
		// Don't listen to the haters
		 Schema::dropIfExists('categories');
	}
};
