
<html>
<body>
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<title>
  Caged Onion
</title>
<body>
<div class=Intro>
<h2>Marketplace</h2>
</div>
<div class=userOptions>
<a href='/register'>Create Account</a>
<a href='/FAQS'>FAQS</a>
<a href='/login' >Login</a>
</div>
<div class=listings>
<p> <?php $i = 0; $resultsArray=array(); $listingIdArray=array();

     if($totalListings != NULL){
     for ($i; $i < $totalListings; $i++){
     $resultsArray[$i]=($results[$i]->ListingTitle);
     $listingIdArray[$i]=($results[$i]->id)
   ?>  <a href="/sampleListing/<?php echo $listingIdArray[$i] ?>"><?php print_r($resultsArray[$i])?></a><br><?php
} }
     else
       echo "Sorry no listing are posted yet.";

?>
</p>
</div>
</body>
</html>
