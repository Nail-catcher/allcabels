<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_point', function (Blueprint $table) {

            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();;
            $table->foreignId('point_id')->constrained('points')->cascadeOnDelete()->cascadeOnUpdate();;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_point');
    }
}
