<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class garbageDisposal extends Controller
{
 public function turnOn()
  {

   $userId = Auth::id(); // Grabs user id

   $results=DB::select('select * from marketListings use INDEX () WHERE Uname = ?', [$userId]); // grabs listings with that user id.
   $resultsCed = count($results);



   return view ('garbageDisposal')->with(['results'=>$results,'numberOfL'=>$resultsCed]); // Sends to page with listings
  }
 public function dump(Request $request)
 {
   $userId = Auth::id();
  $listingIds = $request->input('ListingIds'); // Grabs user input
   $listingIdsArray=array();
   $listingIdsArray=explode(",",$listingIds); // Turns user input into array
   $arrayL = count($listingIdsArray);

   $results=DB::select('select * from marketListings use INDEX () WHERE Uname = ?', [$userId]);
   $resultsCount = count($results);
   $i = 0;
   $storedListings = array();

   for ($d=0;$d < $resultsCount;$d++) // Converts pulled stored listing ids into actual array.
   {
      $storedListings[$d] = $results[$d]->id;
   }

   for ($i; $i < $arrayL;$i++) // Iterate through the user input that is in an array.
   {

    //$listingId = $results[$i]->id;
    if(in_array($listingIdsArray[$i],$storedListings)){ // Looks for userinput one at a time in stored listings
    $results =  DB::table('marketListings')->where('id', $listingIdsArray[$i])->delete(); //Delete listing based off which one user has chosen
    }
  }

  if ($results == 1){
  echo "Listings have been deleted";
  return view ('dummyPage');
  }


}
}
