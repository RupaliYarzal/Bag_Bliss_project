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
        Schema::create('inwords', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pid');
        $table->integer('qty');
        $table->decimal('price', 10, 2);
        $table->timestamps();

        $table->foreign('pid')->references('id')->on('products')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inwords');
    }
};
