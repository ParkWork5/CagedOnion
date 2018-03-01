

<html>



    <title>Caged Onion</title>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


<body>


      <div class="panel-heading"><h2>Listing Creation</h2></div>



        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

        <img src="images/{{ Session::get('image') }}">

        @endif


        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif
        <div class=moreInput>

        {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}


        First Image {!! Form::file('image', array('class' => 'form-control')) !!} <br>
        Second Image{!! Form::file('imageTwo', array('class' => 'form-control')) !!} <br>
        Listing Name {!! Form::text('ListingName') !!} <br>
        Ethereum Wallet {!! Form::text('MoneroWallet') !!} <br>
        Description {!! Form::textarea('ListingDescription') !!} <br>


        <button type="submit" class="btn btn-success">Post Listing</button>


       {!! Form::close() !!}
</div>

<div class=errorMessage>
  <?php echo $error; ?>
</div>
</body>

</html>
