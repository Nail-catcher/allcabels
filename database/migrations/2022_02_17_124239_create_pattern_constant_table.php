<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatternConstantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pattern_constant', function (Blueprint $table) {
            $table->foreignId('pattern_id')->constrained('patterns')->cascadeOnDelete()->cascadeOnUpdate();;
            $table->foreignId('constant_id')->constrained('constants')->cascadeOnDelete()->cascadeOnUpdate();;
            $table->integer('index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pattern_constant');
    }
}
