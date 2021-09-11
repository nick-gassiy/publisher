<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('page');
            $table->timestamp('year');
            $table->unsignedInteger('genre_id');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('author_id');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->timestamps();
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
