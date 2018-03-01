
<html>
<body>
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <title>
    Caged Onion
  </title>

<p> <?php $i = 0; $resultsArray=array(); $g = 1;
         for ($i; $i < $totalListings; $i++){
     $resultsArray[$i]=($results[$i]->ListingTitle);
   ?>  <a href="/sampleListing/<?php print_r($results[$i]->id) ?>"><?php print_r($resultsArray[$i])?>
</a>
<?php echo "Listing ID:" ?>
<?php print_r($results[$i]->id); $g++;?>
<br><?php
}
?>
</p>

<br>

{{ Form::open(array('action'=> array('panelAccess@updateListings')))}}

Listing ids that need to be updated(seperate listings by commas) {!! Form::text('ListingIds') !!}
{!! Form::submit('Update Listings',
      array('class'=>'btn btn-primary')) !!}

{{Form::close()}}
</body>
</html>
