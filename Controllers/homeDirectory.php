<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class homeDirectory extends Controller
{
    public function updatingHomePage(Request $request)
     {

       //$imageName = $request->session()->get('imageName');
       //$imageNameTwo = $request->session()->get('imageNameTwo');

       //echo $imageName;
       //echo $imageNameTwo;

    $results=DB::select('select * from marketUpdate use INDEX ()');
    $numberOfEntries = count($results) - 1;


    $fpuText = ($results[$numberOfEntries]->textUpdate);
  
    $status = "Running";
      try {
    DB::connection()->getPdo();
    } catch (\Exception $e) {
    $status = "Not Running";
}

     return view('cagedOnion', ['status'=>$status,'text'=>$fpuText]);

   }
}
