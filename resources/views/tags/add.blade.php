@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<h2>Add tag</h2>
<form method="POST" action="{{url('/tags')}}">
@csrf

<div class='form-group'>
<label>Name</label>
<input type="text" name='name'>

<br>

<input type="submit" value="Submit" name="submit" class="btn btn-primary">
</div>

</form>

</div>
</div>
</div>
@endsection