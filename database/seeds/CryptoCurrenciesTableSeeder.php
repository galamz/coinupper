<?php

use Illuminate\Database\Seeder;



class CryptoCurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Faker = Faker\Factory::create();


        for($i = 0; $i<50;$i++){

            \App\CryptoCurrency::create([
                'name' => $Faker->userName,
                'symbol' => $Faker->iso8601(4) ,
                'slug' => $Faker->slug(6),
                'algorithm' => $Faker->slug(6),
                'overview' => $Faker->text(200),
                'logo' => $Faker->image(null,'100','100'),
                'price' => $Faker->numberBetween(0,10000),
                'market_cap' => $Faker->numberBetween(0,500000),
                'volume_24h' => $Faker->numberBetween(6,500),
                'change_24h' => $Faker->numberBetween(6,500),
                'circulating' => $Faker->numberBetween(6,500000),
            ]);
        }
    }
}
