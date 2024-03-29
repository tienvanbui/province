<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJapanProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('japan_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('province_name');
            $table->string('kanji_province_name');
            $table->string('hiragana_province_name');
            $table->string('province_capital');
            $table->string('area');
            $table->string('island');
            $table->string('region');
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
        Schema::dropIfExists('japan_provinces');
    }
}
