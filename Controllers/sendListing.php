<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class sendListing extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function justSendIt(Request $request)
    {
       $imageName = $request->session()->get('imageName');
       $imageNameTwo = $request->session()->get('imageNameTwo');
       $listingName = $request->session()->get('listingName');
       $listingDescription = $request->session()->get('listingDescription');
       $moneroWallet = $request->session()->get('moneroWallet');
       $userId = Auth::id();





       $data = array("ListingTitle"=>"{$listingName}","MWallet"=>"{$moneroWallet}","Description"=>"{$listingDescription}","Uname"=>$userId,"ImageName"=>"{$imageName}","OkValue"=>0,"ImageNameTwo"=>"{$imageNameTwo}");


     $results = DB::table('marketListings')->insert($data);
     $listingStatus = "Your listing was not uploaded. Please try again at a later time.";

     $request->session()->forget('imageName');
     $request->session()->forget('imageNameTwo');
     $request->session()->forget('listingName');
     $request->session()->forget('listingDescription');
     $request->session()->forget('moneroWallet');


     if ($results == TRUE){
     $listingStatus = "Your listing was successfully submitted.";
     return view ('servedCarrot', ['listingStatus'=>$listingStatus]);
     }
     else{
     return view ('servedCarrot', ['listingStatus'=>$listingStatus]);
      }
    }
}
