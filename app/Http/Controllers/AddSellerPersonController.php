<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddSellerPerson;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddSellerPersonRequest;

class AddSellerPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sellers=AddSellerPerson::cursor();
        return view('sellerPersons.addsellerperson',['sellers'=>$sellers]);
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
    public function store(AddSellerPersonRequest $request)
    {
         $data= $request->except('_token');
        $sellers=AddSellerPerson::create( $data);
        Session::flash('flash_message', 'SellerPerson successfully added!');
        return  redirect()->route('addsellerPerson.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddSellerPerson  $addSellerPerson
     * @return \Illuminate\Http\Response
     */
    public function show(AddSellerPerson $addSellerPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddSellerPerson  $addSellerPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(AddSellerPerson $addSellerPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddSellerPerson  $addSellerPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddSellerPerson $addSellerPerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddSellerPerson  $addSellerPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy($addSellerPerson)
    {

           $seller=AddSellerPerson::find($addSellerPerson) ;
           $seller->delete();
            return back();
    }
}
