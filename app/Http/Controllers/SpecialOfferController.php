<?php

namespace App\Http\Controllers;

use App\VoucherCode;
use App\Recipient;
use App\SpecialOffer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SpecialOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('special_offer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('special_offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Writing this validation for the unit test
        $request->validate([
            'name' => 'required|string',
            'discount' => 'required|numeric|min:1|max:99',
            'expiration' => 'required|date_format:Y-m-d:after:yesterday'
        ]);


        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'discount' => 'required|numeric|min:1|max:99',
            'expiration' => 'required|date_format:Y-m-d:after:yesterday'
        ]);

        //If validation fails
        if($validate->fails()){
            flash('Operation failed')->error();
            return redirect()->back()->withInput();
        }

        //Insert special offer
        $special_offer = SpecialOffer::create(['name'=> $request->name, 'discount'=>$request->discount, 'expiration'=>$request->expiration]);

        //Fetch all recipients
        $recipients = Recipient::all();

        foreach ($recipients as $rep){
            //Create a new voucher code for each recipient and save the code
            VoucherCode::create(['code'=>str_random(10), 'special_offer_id'=>$special_offer->id, 'recipient_id'=>$rep->id]);
        }
        flash('Voucher created successfully')->success();
        return redirect()->route('special_offers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SpecialOffer  $specialOffer
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialOffer $specialOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SpecialOffer  $specialOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecialOffer $specialOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SpecialOffer  $specialOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpecialOffer $specialOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SpecialOffer  $specialOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecialOffer $specialOffer)
    {
        //
    }

    public function all_special_offer(){
        return Datatables::of(SpecialOffer::all())->make(true);
    }
}
