
<html>
<body>
  <title>
    Caged Onion
  </title>

  <h3>What would you like the front page to say?</h3>

  {{ Form::open(array('action'=> array('panelAccess@frontPanel')))}}

  Update the front page text {!! Form::textarea('update') !!}
  {!! Form::submit('Update FrontPage Text',
        array('class'=>'btn btn-primary')) !!}

  {{Form::close()}}

</body>
</html>
