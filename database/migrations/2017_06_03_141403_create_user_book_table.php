<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::defaultStringLength(191);
        Schema::enableForeignKeyConstraints();
        Schema::create('user_book', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('book_id');
            $table->integer('quantity');
        });

        Schema::table('user_book', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('author_book');
    }
}
