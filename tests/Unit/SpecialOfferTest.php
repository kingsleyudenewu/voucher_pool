<?php

namespace Tests\Unit;

use App\SpecialOffer;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SpecialOfferTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * This test for successful creation of special offers provided no error occurs
     *
     * @return void
     *
     */
    public function testIfWeCanCreateSpecialOffer(){
        $response = $this->post('/special_offers', ['name'=>'Black Friday', 'discount' => 50, 'expiration' =>'2018-10-31']);

        // Redirects after creating the Special Offer
        $response->assertStatus(302);
        $response->assertRedirect(route('index'));
    }

    /**
     * This test returns an error on the discount about being between the range from 1 - 99
     *
     * @return void
     *
     */
    public function testSpecialOffersWithInvalidDiscount(){
        $response = $this->post('/special_offers', ['name'=>'Black Friday', 'discount' => 101, 'expiration' =>'2018-10-31']);
        $response->assertSessionHasErrors(['discount']);
    }

    /**
     * This test the special offers through a post request
     * It also return an error of using a dtring value instead of numeric value for the discount
     *
     * @return void
     *
     */
    public function testSpecialOffersWithInvalidDiscountAsAString(){
        $response = $this->post('/special_offers', ['name'=>'Black Friday', 'discount' => 'asdfjdf', 'expiration' =>'2018-10-31']);
        $response->assertSessionHasErrors(['discount']);
    }

    /**
     * This test the special offer if the user enters a date that has passed
     *
     * @return void
     *
     */
    public function testSpecialOffersWithInvalidDateFormat(){
        $response = $this->post('/special_offers', ['name'=>'Black Friday', 'discount' => 50, 'expiration' =>'2018-07-20']);
        $response->assertSessionHasErrors(['expiration']);
    }
}
