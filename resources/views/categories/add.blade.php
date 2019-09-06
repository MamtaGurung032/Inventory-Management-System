@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<h2>Add Category</h2>

{{--
@if($errors->any())
<div class="alert alert-danger">
  <ul>
  @foreach($errors->all() as $error)
    <li>
    {{ $error }}
    </li>
  @endforeach
  </ul>
</div>

@endif
--}}


<form method='POST' action="{{ url('/categories') }}">
@csrf

<div class="form-group">
<label>Name</label>
<input type='text' name='name' value="{{ old('name')}}" class="form-control" placeholder="Enter name">
<div class="alert-danger">{{ $errors->first('name') }}</div>
</div>

<div class="form-group">
<label>Status</label>
<input type='text' name='status' class="form-control" placeholder="Enter status">
<div class="alert-danger">{{ $errors->first('status')}}</div>

</div>


<input type='submit' value='SUBMIT' name='submit' class="btn btn-primary">


</form>

</div>
</div>
</div>

@endsection