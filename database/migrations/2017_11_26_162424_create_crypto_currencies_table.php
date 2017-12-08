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
            $table->string('symbol')->nullable();
            $table->string('slug')->nullable();
            $table->string('algorithm')->nullable();
            $table->text('overview')->nullable();
            $table->string('logo')->nullable();

            $table->decimal('price_usd',19,6)->nullable();
            $table->decimal('price_btc',19,6)->nullable();

            $table->decimal('market_cap_usd',19,6)->nullable();
            $table->decimal('market_cap_btc',19,6)->nullable();

            $table->decimal('volume_24h_usd',19,6)->nullable();
            $table->decimal('volume_24h_btc',19,6)->nullable();

            $table->decimal('change_7d_usd',19,6)->nullable();
            $table->decimal('change_7d_btc',19,6)->nullable();

            $table->decimal('change_24h_usd',19,6)->nullable();
            $table->decimal('change_24h_btc',19,6)->nullable();

            $table->decimal('change_1h_usd',19,6)->nullable();
            $table->decimal('change_1h_btc',19,6)->nullable();

            $table->decimal('circulating',19,6)->nullable();
            $table->text('mini_chart')->nullable();
            $table->timestamps();

            // scraper

            $table->string('url')->nullable();
            $table->string('url_data')->nullable();

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
