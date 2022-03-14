<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatternGuideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pattern_guide', function (Blueprint $table) {

            $table->foreignId('pattern_id')->constrained('patterns')->cascadeOnDelete()->cascadeOnUpdate();;
            $table->foreignId('guide_id')->constrained('guides')->cascadeOnDelete()->cascadeOnUpdate();;
            $table->boolean('unique');
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
        Schema::dropIfExists('pattern_guide');
    }
}
