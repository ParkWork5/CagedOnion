
<html>
<body>
  <title>
    Caged Onion
  </title>
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
<h1>This is the page where listings are disposed of. Click on the listing you would like to delete and click send it.</h1>

 <?php $i = 0; $resultsArray=array(); $g = 1;
         for ($i; $i < $numberOfL; $i++){
     $resultsArray[$i]=($results[$i]->ListingTitle);
   ?>  <a href="/sampleListing/<?php print_r($results[$i]->id) ?>"><?php print_r($resultsArray[$i])?>
</a>
<?php echo "Listing ID:" ?>
<?php print_r($results[$i]->id); $g++;?>
<br><?php
}
?>
</p>

{{ Form::open(array('action'=> array('garbageDisposal@dump')))}}

Listings that you want to delete(seperate listings by commas) {!! Form::text('ListingIds') !!}
{!! Form::submit('Delete Listings',
      array('class'=>'btn btn-primary')) !!}

{{Form::close()}}





</body>
</html>
