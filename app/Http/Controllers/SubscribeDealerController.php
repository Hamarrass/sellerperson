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
        $dealers = SubscribeDealer::all();
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


        $oldPrice        = $request->input('oldPrice') ? $request->input('oldPrice')  : 0;
        $newPrice        = $request->input('newPrice') ? $request->input('newPrice')  : 0;
        $pricenewold     = ($newPrice - $oldPrice)*0.1 ;

        $oldPrice        = $request->input('oldPrice');
        $newPrice        = $request->input('newPrice');
        $upgrade         = $request->input('upgrade');
        $upgradePrice    = $request->input('upgradePackage') ;
        $newClient       = $request->input('newClient');



        $dateLancement   = $request->input('dateLancement');
        $date            = \Carbon\Carbon::now();
        $lastMonth       = $date->subMonth()->format('Y-m-d'); // November



     /*start test*/
    /* $to   = \Carbon\Carbon::createFromFormat('Y-m-d',$dateLancement);
     $from = \Carbon\Carbon::createFromFormat('Y-m-d',$lastMonth)->addMonth();
     $diff_in_days = $to->diffInDays($date);

      $daysleft =$diff_in_days;

      $benifit  =($daysleft/7)*0.1*;
      dd($benifit);*/



     /*end test*/


        $benifit=0;
        if($newClient=='99'){
            $benifit += 100 ;
        }
        if($newClient=='199'){
            $benifit += 200 ;
        }
        if($newClient=='299'){
            $benifit += 300 ;
        }


        if($upgrade=='upgrade'){

            $benifit +=$upgradePrice  ;
        }
         $benifit =$pricenewold +$benifit;



        $dealers= new SubscribeDealer();
        $dealers->dateVente        = $request->input('dateVente');
        $dealers->dealerId         = $request->input('dealerId');
        $dealers->dateLancement    = $request->input('dateLancement');
        $dealers->newClient        = $request->input('newClient');
        $dealers->upsellerAd360    = $request->input('upsellerAd360');
        $dealers->oldPrice         = $request->input('oldPrice');
        $dealers->newPrice         = $request->input('newPrice');
        $dealers->upgradePackage   = $request->input('upgradePackage') ;
        $dealers->benifit          = $benifit;
        $dealers->seller_person_id = $request->input('seller_person_id');
        $dealers->save();


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
    public function destroy($subscribeDealer)
    {

         $dealer = SubscribeDealer::find($subscribeDealer);
         $dealer->delete();
         return back();
    }
}
