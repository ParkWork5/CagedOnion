<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;


class ImageUploadController extends Controller

{

    public function imageUpload()

    {

        return view('imageUpload');

    }


    public function imageUploadPost(Request $request)

    {

        $validate = Validator::make($request->all(), [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageTwo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ListingName' => 'required|max:50',
            'MoneroWallet' => 'required|max:44',
            'ListingDescription' => 'required|max:255',
        ]);

        if($validate->fails()) {
          $errorMessage = "Check your user input to make sure it complies with the rules";
          return view ('choppedCarrots',['error'=>$errorMessage]);
        }

        

        $listingName = $request->input('ListingName');
        $moneroWallet = $request->input('MoneroWallet');
        $listingDescription = $request->input('ListingDescription');
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        $imageNameTwo = time().'.'.request()->imageTwo->getClientOriginalExtension();

        $request->session()->put('listingName', $listingName);
        $request->session()->put('moneroWallet', $moneroWallet);
        $request->session()->put('listingDescription', $listingDescription);
        $request->session()->put('imageName', $imageName);
        $request->session()->put('imageNameTwo', $imageNameTwo);

        request()->image->move(public_path('images'), $imageName);
        request()->imageTwo->move(public_path('images'), $imageNameTwo);


         return view('cookedCarrot', ['listingName'=>$listingName, 'moneroWallet'=>$moneroWallet, 'listingDescription'=>$listingDescription, 'imageName'=>$imageName, 'imageNameTwo'=>$imageNameTwo]);


    }

}
