<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Transporteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TransporteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities        = City::cursor();
        $countries     = Country::cursor();
        $transporteurs = Transporteur::with('country')->with('city')->get();
        return view('transporteurs.transporteur', compact('cities','countries','transporteurs'));
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
        $image=$request->file('image');

        $imageName =  $request->input('firstname').'_'.  $image->getClientOriginalName();

         $transporteur = new Transporteur();
         $transporteur->country_id  = $request->input('country_id');
         $transporteur->city_id     = $request->input('city_id');
         $transporteur->firstname   = $request->input('firstname');
         $transporteur->lastname    = $request->input('lastname');
         $transporteur->phone       = $request->input('phone');
         $transporteur->image       = $imageName;
         $transporteur->save();


         $image->move(public_path('images/'. $transporteur->id .'_'.$transporteur->firstname),$imageName);



         return redirect()->route('transporteur.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function show($transporteur)
    {
           $cities = City::where('country_id',$transporteur)->get();
           return $cities ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Transporteur $transporteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transporteur $transporteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transporteur $transporteur)
    {
        //
    }
}
