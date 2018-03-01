<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
class listingRetrieve extends Controller
{
  public function collect()
  {
    $results=DB::select('select * from marketListings use INDEX () WHERE OkValue = ?', [1]);
       
    $resultsCed = count($results);
       
    
          
    if ($resultsCed == 0){
    $resultsCed = 0;
    $testNo="There are currently no listings right now.";
    return view('cagedCarrot', ['noList'=>$testNo, 'totalListings'=>$resultsCed]);
        }
    else{
   return view('cagedCarrot')->with(['results'=>$results,'totalListings'=>$resultsCed]);
   
    }
   

  }
  
}
?>
