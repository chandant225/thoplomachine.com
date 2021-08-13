<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();

            $table->string('category', 100)->nullable();
            $table->string('technology')->nullable();

            $table->string('client', 100)->nullable();
            $table->longText('description')->nullable();

            $table->string('link')->nullable();
            $table->string('slug')->nullable();

            $table->string('image');
            $table->longText('video')->nullable();

            $table->integer('likes')->default(0);

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
        Schema::dropIfExists('portfolios');
    }
}
