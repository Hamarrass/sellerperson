<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddSellerPerson;
use App\Models\SubscribeDealer;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddSellerPersonRequest;
use App\Http\Requests\SubscripeDealerRequest;

class SubscribeDealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dealers = SubscribeDealer::cursor();
        $sellers = AddSellerPerson::cursor();
        return view('subscribeDealers.subscribedealer',['dealers'=>$dealers,'sellers'=>$sellers]);
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
    public function store(SubscripeDealerRequest $request)
    {
        $data= $request->except('_token');;
        $dealers=SubscribeDealer::create( $data);

        Session::flash('flash_message', 'Dealer successfully added!');
        return  redirect()->route('subscribedealer.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubscribeDealer  $subscribeDealer
     * @return \Illuminate\Http\Response
     */
    public function show(SubscribeDealer $subscribeDealer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubscribeDealer  $subscribeDealer
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscribeDealer $subscribeDealer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubscribeDealer  $subscribeDealer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscribeDealer $subscribeDealer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscribeDealer  $subscribeDealer
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscribeDealer $subscribeDealer)
    {
        //
    }
}
