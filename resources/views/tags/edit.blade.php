@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


<h2>Edit Tags</h2>
<form method='POST' action="{{url('/tags/'. $tag->id)}}">
@csrf
@method('put')

<div class='form-group'>
<label>Name</label>
<input type="text" name="name" value="{{ $tag->name}}" >

<input type='submit' name='submit' value='Submit' class='btn btn-primary'>

</div>

</form>
</div>
</div>
</div>

@endsection