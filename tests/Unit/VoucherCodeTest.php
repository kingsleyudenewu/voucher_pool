<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoucherCodeTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * This test the API through a get request to fetch all the voucher code that
     * belongs to a particular recipient
     *
     * @return void
     *
     */
    public function testVoucherCodeFromApiToGetAllVouchersOfARecipient(){
        //Please before running this test ensure to copy the email of a recipient from the database to test
        $response = $this->json('GET', '/api/v1/vouchers/kingsley.udenewu@hotmail.com');
        $response->assertStatus(200);
    }

    /**
     * This test the API through a post request to fetch the discount of a valid voucher
     *
     * @return void
     */
    public function testVoucherCodeFromApiThroughPostRequest(){
        $response = $this->json('POST', '/api/v1/voucher', ['code'=>'s7k1L8VIEZ', 'email' => 'hwalsh@example.org']);
        $response->assertStatus(200);
    }

    /**
     * This test the API through a get request to return 400
     * Because we are testing with an invalid email format
     *
     * @return void
     */
    public function testInvalidEmailFromApiThroughGetRequest(){
        $response = $this->json('GET', '/api/v1/vouchers/bcole');
        $response->assertStatus(400);
    }
}
