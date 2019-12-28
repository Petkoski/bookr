<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::enableForeignKeyConstraints();
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('format');
            $table->string('dimensions');
            $table->string('publication_date');
            $table->string('publisher');
            $table->string('publication_city');
            $table->string('language');
            $table->string('isbn10');
            $table->string('isbn13');
            $table->integer('bestsellers_rank');
            $table->unsignedInteger('category_id');

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
