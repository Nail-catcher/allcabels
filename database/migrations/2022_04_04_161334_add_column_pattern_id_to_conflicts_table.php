<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPatternIdToConflictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conflicts', function (Blueprint $table) {
            $table->after('fabric_id', function (Blueprint $table) {
                $table->foreignId('pattern_id')->nullable()->constrained('patterns')->cascadeOnDelete()->cascadeOnUpdate();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conflicts', function (Blueprint $table) {
            //
        });
    }
}
