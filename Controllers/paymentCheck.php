<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GethApi;
use DB;
use EtherScan\EtherScan;
use EtherScan\Resources\ApiConnector;
class paymentCheck extends Controller
{
    public function checkIt(Request $request)
    {
       request()->validate([
         'usersWallet' => 'required',
         'pin' => 'required'
       ]);

      $userId = Auth::user();
      $userInput = $request->input('usersWallet');


      $results=DB::select('select * from paymentRecords use INDEX () WHERE etherWallet = ?', [$userInput]);

      $walletHits = count($results);

      if($walletHits == 0){
        echo "No wallets with that address found";
      }
      else{

        for($i=0; $i < $walletHits; $i++){

          if ($results[$i]->okValue == 1){
            unset($results[$i]);
          }
          else{

          }
        }
        $results=array_values($results);

        if (count($results) == 0){
          echo "All entries have been used up";
        }
        else{
        $chosenWallet = $results[0];
        $chosenWID=$chosenWallet->id;

        $updatingListing = DB::table('paymentRecords')
            ->where('id', $chosenWID)
            ->update(['okValue' => 1]);

        $errorMessage="";

        return view ('choppedCarrots',['error'=>$errorMessage]);
      }

      }

    }

    public function updateIt(){
      require_once('/home/vagrant/code/market/vendor/autoload.php');
      $geth = new \GethApi\GethApi([
               //Geth JSON-RPC version
              'version' => '2.0',
               //Host part of address
              'host' => '127.0.0.1',
               //Port part of address
              'port' => 8545,
              // Return results as associative arrays instead of objects
              'assoc' => true,
      ]);

      $esApiConnector = new ApiConnector('J26AM7SXS7QT4SNWX5HKUD36SNQVCH9S1J');
      $etherScan = new EtherScan($esApiConnector);

      $account = $etherScan->getAccount(EtherScan::PREFIX_API);
      $transactions = $account->getTransactions('0xa00c9F18b9eda6928E7f2620C0Af7983aAA7d5E7',1,500,'desc');

      $walletList = explode('from":"', $transactions); // Chop string into array @ word from.
      $walletLength = count($walletList); // Count for how many wallets there are.
      $walletSorted = array_slice($walletList, 1, $walletLength); // Delete first element because it contains stuff we don't need
      $paidWallets=array();
      $i=0;
      foreach($walletSorted as &$value){
         $paidWallets[$i]=substr($value, 0, 42); //List of wallets that paid. Only need to go out 42 characters because wallet length is fixed.
         $i++;
      }

      $timestampList = explode('timeStamp":"', $transactions);
      $timestampLength = count($timestampList);
      $timestampSorted = array_slice($timestampList, 1, $timestampLength);
      $paidTimeStamps = array();
      $t = 0;
      foreach($timestampSorted as &$element){
        $paidTimeStamps[$t]=substr($element, 0, 10);
        $t++;
      }

      $amountSentList = explode('value":"', $transactions);
      $amountSentLength = count ($amountSentList);
      $amountListSorted = array_slice($amountSentList, 1, $amountSentLength);
      $paidAmount = array();
      $a = 0;
      foreach($amountListSorted as &$ether){
        $paidAmount[$a]=substr($ether, 0, 20);
        $a++;
      }

      $databaseRecords=DB::select('select * from paymentRecords use INDEX () ');
      $amountDatabaseRecords = count($databaseRecords);
      $correctedWalletLength = $walletLength - 1; //Correction because arrays
      //echo $amountDatabaseRecords;
      //echo $walletLength;
      if ($correctedWalletLength - $amountDatabaseRecords == $correctedWalletLength){
        for($r=0;$r < $correctedWalletLength; $r++){
          $data = array("etherWallet"=>"{$paidWallets[$r]}","etherPaidInWei"=>"{$paidAmount[$r]}","timeStamp"=>"{$paidTimeStamps[$r]}","okValue"=>0);
          $results = DB::table('paymentRecords')->insert($data);

        }
        echo "Listings have been added to the database";
        return view('vegatableStand');
      }
        else{
          $arrayChop = $walletLength - $amountDatabaseRecords; //Determines how many records needed to match database and etherscan.

          if ($arrayChop == 0){

          }
          else{
          $arrayChop--; //corrects where loop stops. Prevents out of bounds errors.
          array_splice($paidAmount, $arrayChop, $amountSentLength); // Etherscan updates its transactions from top down. By doing this we only get the new records and not the old ones.
          array_splice($paidWallets, $arrayChop, $walletLength);
          array_splice($paidTimeStamps, $arrayChop, $timestampLength);


          for($r=0; $r < $arrayChop; $r++){
          $data = array("etherWallet"=>"{$paidWallets[$r]}","etherPaidInWei"=>"{$paidAmount[$r]}","timeStamp"=>"{$paidTimeStamps[$r]}","okValue"=>0);
          $results = DB::table('paymentRecords')->insert($data);

          return view ('vegatableStand');
    }


}
}
}

public function preCheck(Request $request){

  $userPin = $request->input('pin');

  $accountPins = DB::select('select * from accountWallets use INDEX () WHERE UName = ?',[$userId]);

  for($i=0; $i < count($accountPins);$i++){
  if (Hash::check($userPin, $accountPins[$i])){
    checkIt();
  }
  else{
    echo "Pin inputed does not match any in storage try again.";
    return view('dummyPage');
  }
}


}
}
