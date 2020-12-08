<?php

namespace App\Http\Controllers;

use App\Models\SellerPerson;
use Illuminate\Http\Request;

class SellerPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sellerPersons.sellerperson');
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
     * @param  \App\Models\SellerPerson  $sellerPerson
     * @return \Illuminate\Http\Response
     */
    public function show(SellerPerson $sellerPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellerPerson  $sellerPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerPerson $sellerPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellerPerson  $sellerPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerPerson $sellerPerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellerPerson  $sellerPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellerPerson $sellerPerson)
    {
        //
    }
}
