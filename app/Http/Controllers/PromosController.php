<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Promo;

class PromosController extends Controller
{
    public function index() {
        
        $promos = Promo::all();
        $users = User::all();

        return view('welcome')->with([
            'promos' => $promos,
            'users' => $users
        ]);
    }

    public function optIn(Request $r) {

        $currentPromo = Promo::find($r->input('promo_id'));
        $username = $r->input('username');
        $player = User::where(['name' => $username])->first();

        if(!$player) return redirect()->back()->with('alert', 'Username not found :(');

        $promos = $player->promos;

        foreach($promos as $promo) {
            if($promo->id == $currentPromo->id) {

                if($promo->pivot->status == Promo::PROMO_STATUS_NOT_ELIGIBLE)
                    return redirect()->back()->with('alert', 'Sorry, you are not eligible for this promo!');

                if($promo->pivot->status == Promo::PROMO_STATUS_OPTED_IN)
                    return redirect()->back()->with('alert', 'Already opted in!');
                
                $promo->pivot->status = Promo::PROMO_STATUS_OPTED_IN;
                $promo->pivot->save();

                return redirect()->back()->with('alert', 'Successfully opted in!');

            }
        }
        
    }
}
