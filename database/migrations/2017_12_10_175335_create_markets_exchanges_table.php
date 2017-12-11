<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketsExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets_exchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_crypto_currencie')->nullable();
            $table->integer('id_market')->nullable();
            $table->string('url')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();

            $table->decimal('volume_24h_usd',19,6)->nullable();
            $table->decimal('volume_24h_btc',19,6)->nullable();
            $table->decimal('volume_24h_native',19,6)->nullable();


            $table->decimal('price_24h_usd',19,6)->nullable();
            $table->decimal('price_24h_btc',19,6)->nullable();
            $table->decimal('price_24h_native',19,6)->nullable();

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
        Schema::dropIfExists('markets_exchanges');
    }
}
