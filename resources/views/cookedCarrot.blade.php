
<html>
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<body>
  <title>
    Caged Onion
  </title>
<div class=navbar-header>
<h1>This is a listing preview</h1>
</div>
<div class=images>
<image img src="images/<?php echo $imageName; ?>"style="width:200px;height:200px;"></image>
</div>
<div class=imagesTwo>
<image img src="images/<?php echo $imageNameTwo; ?>"style="width:200px;height:200px;"></image>
</div>

<div class=ListingTitle>
  <h3><?php echo $listingName; ?></h3>
  </div>
<div class=ListingContent>
<p><?php echo $listingDescription; ?></p>
</div>

<div class=MoneroWallet>
  <p>Pay me at: <?php echo $moneroWallet; ?></p>
</div>
<a href="{{action('sendListing@justSendIt')}}">Submit Listing</a>
</body>
</html>
