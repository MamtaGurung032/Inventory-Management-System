@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h2>Edit Category</h2>
<form method='POST' action="{{url('/categories/'.$category->id)}}">
@csrf
@method('put')

<div class="form-group">
<label>Name</label>
<input type='text' name='name' value="{{$category->name}}" class="form-control" placeholder="Enter name">  
<div class="alert-danger">{{  $errors->first('name') }}</div>
</div>

<div class="form-group">
<label>Status</label>
<input type='text' name='status' value="{{$category->status}}" class="form-control" placeholder="Enter status">
<div class="alert-danger">{{  $errors->first('status') }}</div>

</div>

<input type='submit' value='Submit' name='submit' class='btn btn-primary'>


</form>
</div>
</div>
</div>

@endsection