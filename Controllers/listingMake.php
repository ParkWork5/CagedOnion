<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class listingMake extends Controller
{
 public function send()
 {
  $listingName = session('listingName');
  $moneroWallet  = session('moneroWallet');
  $listingDescription = session('listingDescription');
  $imageName = session('imageName');
  
  
  return view('cookedCarrot', ['listingName'=>$listingName]); 
 }
   
}
