
<html>
<body>
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <title>
    Caged Onion
  </title>
  <div class=pinInfo>
  <p>Input the pin and the wallet you would like to link together.</p>
  <p>Your pin can be alphanumeric and can be as long as you like.</p>
</div>
<div class=pinInput>
  {{ Form::open(array('action'=> array('spray@highPressure')))}}

  Enter in your pin here: {!! Form::text('pin') !!} <br>
  Enter in your wallet here: {!! Form::text('wallet')!!}
  {!! Form::submit('Set Pin and Wallet',
        array('class'=>'btn btn-primary')) !!}

  {{Form::close()}}
</div>
</body>
</html>
