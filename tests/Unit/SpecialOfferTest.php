<?php

namespace Tests\Unit;

use App\SpecialOffer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SpecialOfferTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testIfWeCanCreateSpecialOffer(){
        $special_offer = SpecialOffer::create(['name'=> 'Black Friday', 'discount'=>'50', 'expiration'=>'2018-10-31']);
    }
}
