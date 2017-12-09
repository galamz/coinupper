<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_crypto_currencie')->nullable();
            $table->decimal('price_btc',19,6)->nullable();
            $table->decimal('price_usd',19,6)->nullable();
            $table->decimal('volume_usd',19,6)->nullable();
            $table->decimal('market_cap_by_available_supply',19,6)->nullable();
            $table->timestamp('time');
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
        Schema::dropIfExists('data');
    }
}
