<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->string('url');
            $table->string('type');
            $table->integer('category_id')->unsigned();
            $table->integer('platform_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->integer('framework_id')->unsigned();
			$table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('platform_id')->references('id')->on('platforms');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('framework_id')->references('id')->on('frameworks');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
