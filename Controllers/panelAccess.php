<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class panelAccess extends Controller
{
    public function papersPlease()
{

   $userId = Auth::id();

   if ($userId == 2){
   return view ('vegatableStand');
 }
 else {
   return view ('cagedOnion');
 }


}

  public function loadListings()
{
  self::papersPlease();
  $results=DB::select('select * from marketListings use INDEX () WHERE OkValue = ?', [0]);

    $resultsCed = count($results);



    if ($resultsCed == 0){
    echo "There are currently no listings right now.";
    return view ('vegatableStand');
        }


   return view ('listingApprove')->with(['results'=>$results,'totalListings'=>$resultsCed]);

}

 public function updateListings(Request $request)
{
  self::papersPlease();
   $listingIds = $request->input('ListingIds');
   $listingIdsArray=array();
   $listingIdsArray=explode(",",$listingIds);

   $arrayL = count($listingIdsArray);
   $i = 0;
   for ($i; $i < $arrayL;$i++)
   {

  $results =  DB::update("update marketListings set OkValue = 1 where Id = ?", [$listingIdsArray[$i]]);
}
  if ($results == TRUE){
   echo "Listings have been updated";
   }
}
 public function deleteListings()
{
  self::papersPlease();
   $results=DB::select('select * from marketListings use INDEX ()');

    $resultsCed = count($results);



    if ($resultsCed == 0){
    echo "There are currently no listings right now.";
    return view ('vegatableStand');
        }


   return view ('listingDelete')->with(['results'=>$results,'totalListings'=>$resultsCed]);



}

 public function deleteListingsNow(Request $request)
{
  self::papersPlease();
  $listingIds = $request->input('ListingIds');
   $listingIdsArray=array();
   $listingIdsArray=explode(",",$listingIds);
   #print_r($listingIdsArray[0]);
   $arrayL = count($listingIdsArray);
   $i = 0;
   for ($i; $i < $arrayL;$i++)
   {

  $results =  DB::table('marketListings')->where('id', $listingIdsArray[$i])->delete();

  if ($results == TRUE){
    echo "Listings have been deleted";
    return view ('vegatableStand');

   }
}
}
public function frontPanel(Request $request){
  self::papersPlease();

$textUpdate = $request->input('update');

$data = array("textUpdate"=>$textUpdate);

$results = DB::table('marketUpdate')->insert($data);

return view ('vegatableStand');

}

}
