<?php

namespace App\Http\Controllers;

use App\Recipient;
use App\VoucherCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\VoucherCode as VoucherCodeResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class VoucherCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('voucher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VoucherCode  $voucherCode
     * @return \Illuminate\Http\Response
     */
    public function show(VoucherCode $voucherCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VoucherCode  $voucherCode
     * @return \Illuminate\Http\Response
     */
    public function edit(VoucherCode $voucherCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VoucherCode  $voucherCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoucherCode $voucherCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VoucherCode  $voucherCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoucherCode $voucherCode)
    {
        //
    }

    public function allVoucher(){
        $voucher_code = VoucherCode::join('recipients', 'recipient_id', '=', 'recipients.id')
            ->join('special_offers', 'special_offer_id', '=', 'special_offers.id')
            ->select(DB::raw('code, recipients.name as recipient_name, special_offers.name as special_offer_name, discount, expiration, date_used'))
            ->get();

        return Datatables::of($voucher_code)->make(true);
    }

    public function verifyVoucher(Request $request)
    {
        $validate = Validator::make($request->all(), [
           'code' => 'required|min:8',
            'email' => 'required|string|email'
        ]);

        if($validate->fails()){
            return response()->json([
                'code'      => 400,
                'message'   => $validate->errors()->first()
            ], 400);
        }
        else{
            //Get recipient id from the email
            $getRecipientId = Recipient::where('email', $request->email)->first();

            //Verify if the email is valid
            if (!$getRecipientId) {
                return response()->json([
                    'code'      => 400,
                    'message'   => 'Invalid email address.'
                ], 400);
            }

            $validateCode = $getRecipientId->vouchers()->select('voucher_codes.id', 'special_offers.discount')->join('special_offers', 'voucher_codes.special_offer_id', '=', 'special_offers.id')->where([['voucher_codes.code', $request->code],['special_offers.expiration', '>=', Carbon::today()]])->whereNull('voucher_codes.date_used')->first();

            //Check if validation was successful
            if (!$validateCode) {
                return response()->json([
                    'code'      => 400,
                    'message'   => 'Operation failed, invalid voucher or voucher has been used already.'
                ], 400);
            }

            //Update the code by setting the date used
            VoucherCode::where('id', $validateCode->id)->update(['date_used' => Carbon::now()]);

            return response()->json([
                'code'      => 200,
                'message'   => 'Successful',
                'discount'  => number_format($validateCode->discount).'%'
            ]);
        }
    }

    public function voucherMailList(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|string|email'
        ]);

        if($validate->fails()){
            return response()->json([
                'code'      => 400,
                'message'   => $validate->errors()->first()
            ], 400);
        }

        $getEmail = Recipient::where('email', $request->email)->first();
        if(!$getEmail){
            return response()->json([
                'code'      => 400,
                'message'  => 'Email does not exist'
            ]);
        }

        //Fetch all valid vouchers that belongs to the Recipient
        $getVouchers = $getEmail->vouchers()->join('special_offers', 'special_offer_id', '=', 'special_offers.id')->select('code')->whereNull('voucher_codes.date_used')->get();

        if(!$getVouchers){
            return response()->json([
                'code'      => 400,
                'message'  => 'No voucher available'
            ]);
        }

        return response()->json([
            'code'      => 200,
            'message'   => 'Successful',
            'discount'  => $getVouchers
        ]);
    }
}

