
<html>
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<body>
  <title>
    Caged Onion
  </title>

<?php
      $i = 0;
      $listingName = ($results[$i]->ListingTitle);
      $imageName = ($results[$i]->ImageName);
      $listingDescription = ($results[$i]->Description);
      $moneroWallet = ($results[$i]->MWallet);
      $imageNameTwo = ($results[$i]->ImageNameTwo);
      ?>


<div class=images>
<image img src="/images/<?php echo $imageName; ?>" style="width:200px;height:200px;"></image>
</div>
<div class=imagesTwo>
<image img src="/images/<?php echo $imageNameTwo; ?>" style="width:200px;height:200px;"></image>
</div>
<div class=ListingTitle>
  <h3><?php echo $listingName; ?></h3>
  </div>
<div class=ListingContent>
<p><?php echo $listingDescription; ?></p>
</div>

<div class=MoneroWallet>
  <p>This users monero wallet is: <?php echo $moneroWallet; ?></p>
</div>
</body>
</html>
