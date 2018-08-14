<?php

namespace App\Http\Controllers;

use App\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recipient.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:recipients,email'
        ]);

        //If validation fails
        if($validate->fails()){
            flash('Operation failed '.$validate->errors()->first())->error();
            return redirect()->back()->withInput();
        }

        //Insert recipient
        Recipient::create(['name'=> $request->name, 'email'=>$request->email]);
        return redirect()->route('recipients.index');
    }

    public function  all_recipient(){
        return Datatables::of(Recipient::all(['name', 'email']))->make(true);
    }
}
