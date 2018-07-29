<?php

use Illuminate\Database\Seeder;

class SpecialOfferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\SpecialOffer::class,5)->create();
    }
}
