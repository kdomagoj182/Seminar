<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('slug');
            $table->date('birthday');
            $table->string('oib')->unique();
            $table->string('address');
            $table->string('homenumber');
            $table->string('hometown');
            $table->unsignedBigInteger('user_id');
              $table->timestamps();
              
            $table->unique('slug');
      			$table->foreign('user_id')
      				  ->references('id')->on('users')
      				  ->onDelete('cascade');
              });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
