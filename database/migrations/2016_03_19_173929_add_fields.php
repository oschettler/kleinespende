<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buttons', function (Blueprint $table) {
            $table->string('name', 100);
            $table->string('type', 40);
            $table->string('button_id', 40);
            $table->string('button_key');
            $table->decimal('amount', 5, 2);
            $table->integer('receiver_id')->unsigned();
            $table->foreign('receiver_id')->references('id')->on('receivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buttons', function (Blueprint $table) {
            //
        });
    }
}
