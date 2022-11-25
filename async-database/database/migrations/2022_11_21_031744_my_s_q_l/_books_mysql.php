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
        //
        if(Schema::connection('mysql')->hasTable('books')){
            return;
        }
        Schema::connection('mysql')->create('books', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->string("note");
            $table->uuid('author_id');
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
        Schema::connection('mysql')->drop('books');
    }
};
