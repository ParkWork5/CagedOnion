<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Http\Requests;
use Http\Request\ContactFormRequest;

class AboutController extends Controller {

    public function create()
    {
        return view('cagedOnion');
    }

    public function store()
    {
      $listingName = Request::input('ListingName');
     return view('choppedCarrot')
        
    }

}


