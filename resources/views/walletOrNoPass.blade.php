
<html>
<body>
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  <title>
    Caged Onion
  </title>

<div class=passText>
<p>Enter in the address of your wallet that you paid the site with</p>

<p>Having trouble? Check out the FAQs for anwsers to common questions</p>
</div>
<div class=pWInput>
{{ Form::open(array('action'=> array('paymentCheck@checkIt')))}}

Ethereum Wallet {!! Form::text('usersWallet') !!} <br>
Pin Linked to Wallet {!! Form::text('pin')!!}
{!! Form::submit('Check Wallet',
      array('class'=>'btn btn-primary')) !!}

{{Form::close()}}
</div>

</body>
</html>
