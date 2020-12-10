<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return    view('home');
    }


    public function newClient()
    {
        $newClient= DB::select("SELECT
        SUM(CASE WHEN MONTH(dateVente) = 1 THEN 100 ELSE 0 END) AS 'Jan',
         SUM(CASE WHEN MONTH(dateVente) = 2 THEN 100 ELSE 0 END) AS 'Fev',
         SUM(CASE WHEN MONTH(dateVente) = 3 THEN 100 ELSE 0 END) AS 'Mar',
         SUM(CASE WHEN MONTH(dateVente) = 4 THEN 100 ELSE 0 END) AS 'Avril',
        SUM(CASE WHEN MONTH(dateVente) = 5 THEN 100 ELSE 0 END) AS 'Mai',
         SUM(CASE WHEN MONTH(dateVente) = 6 THEN 100 ELSE 0 END) AS 'Juin',
         SUM(CASE WHEN MONTH(dateVente) = 7 THEN 100 ELSE 0 END) AS 'Juil',
         SUM(CASE WHEN MONTH(dateVente) = 8 THEN 100 ELSE 0 END) AS 'Aout',
         SUM(CASE WHEN MONTH(dateVente) = 9 THEN 100 ELSE 0 END) AS 'Sept',
         SUM(CASE WHEN MONTH(dateVente) = 10 THEN 100 ELSE 0 END) AS 'Oct',
         SUM(CASE WHEN MONTH(dateVente) = 11 THEN 100 ELSE 0 END) AS 'Nov',
        SUM(CASE WHEN MONTH(dateVente) = 12 THEN 100 ELSE 0 END) AS 'Dec',
        seller_person_id
         FROM `subscribe_dealers` where newClient is not null group by seller_person_id");
         return view('finish.newclient',compact('newClient'));
    }

    public function upgradePackage()
    {
        $upgradePackage= DB::select("SELECT
        SUM(CASE WHEN MONTH(dateVente) = 1 THEN upgradePackage ELSE 0 END) AS 'Jan',
        SUM(CASE WHEN MONTH(dateVente) = 2 THEN upgradePackage ELSE 0 END) AS 'Fev',
        SUM(CASE WHEN MONTH(dateVente) = 3 THEN upgradePackage ELSE 0 END) AS 'Mar',
        SUM(CASE WHEN MONTH(dateVente) = 4 THEN upgradePackage ELSE 0 END) AS 'Avril',
        SUM(CASE WHEN MONTH(dateVente) = 5 THEN upgradePackage ELSE 0 END) AS 'Mai',
        SUM(CASE WHEN MONTH(dateVente) = 6 THEN upgradePackage ELSE 0 END) AS 'Juin',
        SUM(CASE WHEN MONTH(dateVente) = 7 THEN upgradePackage ELSE 0 END) AS 'Juil',
        SUM(CASE WHEN MONTH(dateVente) = 8 THEN upgradePackage ELSE 0 END) AS 'Aout',
        SUM(CASE WHEN MONTH(dateVente) = 9 THEN upgradePackage ELSE 0 END) AS 'Sept',
        SUM(CASE WHEN MONTH(dateVente) = 10 THEN upgradePackage ELSE 0 END) AS 'Oct',
        SUM(CASE WHEN MONTH(dateVente) = 11 THEN upgradePackage ELSE 0 END) AS 'Nov',
        SUM(CASE WHEN MONTH(dateVente) = 12 THEN upgradePackage ELSE 0 END) AS 'Dec'
        ,seller_person_id
        FROM `subscribe_dealers` where upgradePackage is not null group by seller_person_id");
        return view('finish.upgradepackage',compact('upgradePackage'));
    }



    public function debug()
    {
       $newClient= DB::select("SELECT
       SUM(CASE WHEN MONTH(dateVente) = 1 THEN 100 ELSE 0 END) AS 'Jan',
        SUM(CASE WHEN MONTH(dateVente) = 2 THEN 100 ELSE 0 END) AS 'Fev',
        SUM(CASE WHEN MONTH(dateVente) = 3 THEN 100 ELSE 0 END) AS 'Mar',
        SUM(CASE WHEN MONTH(dateVente) = 4 THEN 100 ELSE 0 END) AS 'Avril',
       SUM(CASE WHEN MONTH(dateVente) = 5 THEN 100 ELSE 0 END) AS 'Mai',
        SUM(CASE WHEN MONTH(dateVente) = 6 THEN 100 ELSE 0 END) AS 'Juin',
        SUM(CASE WHEN MONTH(dateVente) = 7 THEN 100 ELSE 0 END) AS 'Juil',
        SUM(CASE WHEN MONTH(dateVente) = 8 THEN 100 ELSE 0 END) AS 'Aout',
        SUM(CASE WHEN MONTH(dateVente) = 9 THEN 100 ELSE 0 END) AS 'Sept',
        SUM(CASE WHEN MONTH(dateVente) = 10 THEN 100 ELSE 0 END) AS 'Oct',
        SUM(CASE WHEN MONTH(dateVente) = 11 THEN 100 ELSE 0 END) AS 'Nov',
       SUM(CASE WHEN MONTH(dateVente) = 12 THEN 100 ELSE 0 END) AS 'Dec',
       seller_person_id
        FROM `subscribe_dealers` where newClient is not null group by seller_person_id");

//dd($newClient);

    $upgradePackage= DB::select("SELECT
    SUM(CASE WHEN MONTH(dateVente) = 1 THEN upgradePackage ELSE 0 END) AS 'Jan',
    SUM(CASE WHEN MONTH(dateVente) = 2 THEN upgradePackage ELSE 0 END) AS 'Fev',
    SUM(CASE WHEN MONTH(dateVente) = 3 THEN upgradePackage ELSE 0 END) AS 'Mar',
    SUM(CASE WHEN MONTH(dateVente) = 4 THEN upgradePackage ELSE 0 END) AS 'Avril',
    SUM(CASE WHEN MONTH(dateVente) = 5 THEN upgradePackage ELSE 0 END) AS 'Mai',
    SUM(CASE WHEN MONTH(dateVente) = 6 THEN upgradePackage ELSE 0 END) AS 'Juin',
    SUM(CASE WHEN MONTH(dateVente) = 7 THEN upgradePackage ELSE 0 END) AS 'Juil',
    SUM(CASE WHEN MONTH(dateVente) = 8 THEN upgradePackage ELSE 0 END) AS 'Aout',
    SUM(CASE WHEN MONTH(dateVente) = 9 THEN upgradePackage ELSE 0 END) AS 'Sept',
    SUM(CASE WHEN MONTH(dateVente) = 10 THEN upgradePackage ELSE 0 END) AS 'Oct',
    SUM(CASE WHEN MONTH(dateVente) = 11 THEN upgradePackage ELSE 0 END) AS 'Nov',
    SUM(CASE WHEN MONTH(dateVente) = 12 THEN upgradePackage ELSE 0 END) AS 'Dec'
    ,seller_person_id
    FROM `subscribe_dealers` where upgradePackage is not null group by seller_person_id");

/*$upgradePackage= DB::select("SELECT MONTH(NOW()) as mois");

if($upgradePackage==1)
{

}
elseif($upgradePackage==2)
{

}
dd($upgradePackage);*/

$data = collect($newClient)->merge($upgradePackage);
//$data=$data->groupBy('seller_person_id');
/*$data[2]=null;*/
dd($data);



$mois = $data->groupBy('seller_person_id')->map(function ($row) {
    return $row->sum('Dec');
});


dd($mois);
/*$grouped = $users->groupBy('seller_person_id')
                            ->map(function ($item) {
                                return $item->sum('Dec')->sum('Nov');
                            });*/





    }
}
