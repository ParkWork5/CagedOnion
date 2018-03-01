<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sampleRetrieve extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function sendIt($listingId)
    {
      # echo $listingId;
       $results=DB::select('select * from marketListings use INDEX () WHERE id = ?', [$listingId]);
       
     # print_r($results);
      return view('sampledCarrot')->with(['results'=>$results]);        
      
    }

}
