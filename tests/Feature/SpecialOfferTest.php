<?php

namespace Tests\Feature;

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

    public function testSpecialOfferPage(){
        $response = $this->get('/special_offers');
        $response->assertStatus(200);
    }

    public function testSpecialOfferCreatePage(){
        $response = $this->get('/special_offers/create');
        $response->assertStatus(200);
    }
}
