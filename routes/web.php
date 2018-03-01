<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'homeDirectory@updatingHomePage');
Route::get('/market','listingRetrieve@collect');

Route::get('/logout','logout@logout');
Route::get('/register',function (){
	return view('register');
});
//Route::get('/login',function(){
//	return view('login');
//});

Route::get('/vegatableStand', 'panelAccess@papersPlease')->middleware('auth');
Route::get('/listingApprove', 'panelAccess@loadListings')->middleware('auth');
Route::post('/listingApprove/update', 'panelAccess@updateListings')->middleware('auth');
Route::get('/listingDelete','panelAccess@deleteListings')->middleware('auth');
Route::post('/listingDelete/delete', 'panelAccess@deleteListingsNow')->middleware('auth');
Route::get('/listingUpdate','paymentCheck@updateIt')->middleware('auth');
Route::get('/FPU', function(){
	return view ('frontPageUpdate');
})->middleware('auth');
Route::post('/FPU/sent','panelAccess@frontPanel')->middleware('auth');

Route::get('/garbageDisposal', 'garbageDisposal@turnOn')->middleware('auth');
Route::post('/garbageDisposal/sendIt', 'garbageDisposal@dump')->middleware('auth');

Route::get('/sampleListing/{listingId}', 'sampleRetrieve@sendIt');
Route::get('/servedCarrot','sendListing@justSendIt');
Route::get('/cookedCarrot',function (){
        return view('cookedCarrot');
});
Route::get('/choppedCarrots',function (){
        return view('walletOrNoPass');
});
Route::get('/cookedCarrots', 'listingMake@send')->middleware('auth');

Route::post('/FDA', 'paymentCheck@preCheck')->middleware('auth');
Route::post('/FDA/redTape','paymentCheck@checkIt')->middleware('auth');
Route::get('/FAQS', function(){
	return view ('FAQS');
});

Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload'])->middleware('auth');
Route::post('image-upload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost'])->middleware('auth');

Route::get('/theMist','spray@nozzle')->middleware('auth');
Route::post('/theMist/hP','spray@highPressure')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
