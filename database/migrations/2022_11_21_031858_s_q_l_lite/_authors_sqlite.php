<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::connection('sqlite')->hasTable('authors')) {
            return;
        }
        Schema::connection("sqlite")->create('authors', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->string('name');
            $table->string('email');
            $table->text('bio');
            $table->integer('total_books');
            $table->foreign('id')->references('author_id')->on('books');
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
        //
        Schema::connection('sqlite')->drop('authors');
    }
};
