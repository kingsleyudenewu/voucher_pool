<?php

use Illuminate\Database\Seeder;

class VoucherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\VoucherCode::class, 50)->create([
            'special_offer_id' => rand(1,5),
            'recipient_id' => rand(1,10)
        ]);
    }
}
