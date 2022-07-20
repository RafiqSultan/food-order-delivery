<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('undefined');
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 6, 2);
            $table->decimal('estCost', 6, 2)->default('undefined');
            $table->string('image');
            $table->string('size');
            $table->integer('candy')->default('0');
            $table->integer('meal')->default('0');
            $table->integer('drink')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
