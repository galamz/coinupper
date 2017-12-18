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
            $table->string('full_name')->nullable();
            $table->integer('rank');
            $table->string('symbol')->nullable();
            $table->string('slug')->nullable();
            $table->string('algorithm')->nullable();
            $table->longText('overview')->nullable();
            $table->longText('social')->nullable();
            $table->string('logo')->nullable();

            $table->float('price_usd',19,6)->nullable();
            $table->float('price_btc',19,6)->nullable();

            $table->float('market_cap_usd',19,6)->nullable();

            $table->float('volume_24h_usd',19,6)->nullable();

            $table->float('available_supply',19,6)->nullable();

            $table->float('max_supply',25,6)->nullable();

            $table->float('percent_change_1h',19,6)->nullable();
            $table->float('percent_change_24h',19,6)->nullable();
            $table->float('percent_change_7d',19,6)->nullable();
            $table->integer('last_updated')->nullable();

            // scraper

            $table->string('url')->nullable();
            $table->string('url_data')->nullable();
            $table->string('tradingview_id')->nullable();
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
