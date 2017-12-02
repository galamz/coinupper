<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('iso_code')->nullable();
            $table->string('slug')->nullable();
            $table->string('algorithm')->nullable();
            $table->text('overview')->nullable();
            $table->string('logo')->nullable();
            $table->float('price')->nullable();
            $table->float('market_cap')->nullable();
            $table->float('volume_24h')->nullable();
            $table->float('change_24h')->nullable();
            $table->float('circulating')->nullable();
            $table->text('mini_chart')->nullable();
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
        Schema::dropIfExists('crypto_currencies');
    }
}
