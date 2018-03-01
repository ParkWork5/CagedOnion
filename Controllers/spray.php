<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

class spray extends Controller
{
    public function nozzle(){

    // $userId = Auth::id();

    // $results=DB::select('select * from walletLinking use INDEX () WHERE UName = ?', [$userId]);

    return view('theMist ');

}
     public function highPressure(Request $request){
        $userId = Auth::id();
        $userPass = $request->input('pin');
        $userWallet = $request->input('wallet');

        $hashed = Hash::make('passed', ['rounds'=>12]);

        $dataP = array("hashedPin"=>"{$hashed}","etherWallet"=>"{$userWallet}","UName"=>"{$userId}");
        $results = DB::table('accountWallets')->insert($dataP);

        echo "Pin and wallet have been linked";
        return view ('dummyPage');

     }

    }
