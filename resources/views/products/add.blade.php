@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h2>Add products</h2>

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


<form method='POST' action="{{url('/products')}}">
@csrf

<div class="form-group">
<label>Name</label>
<input type='text' name='name' class="form-control" placeholder="Enter name">
<div class="alert-danger">{{ $errors->first('name')}}</div>

</div><br>

<div class="form-group">
<label>Description</label>
<textarea name='description' class="form-control" placeholder="Enter description"></textarea>
<div class="alert-danger">{{ $errors->first('description')}}</div>
      
</div><br>

<div class="form-group">
<label>Price</label>
<input type='text' name='price' class="form-control" placeholder="Enter price">
<div class="alert-danger">{{ $errors->first('price')}}</div>

</div><br>

<label>Status</label>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio1" name="status" value=1 class="custom-control-input">
  <label class="custom-control-label" for="customRadio1">Active</label>

</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="status" value=0 class="custom-control-input">
  <label class="custom-control-label" for="customRadio2">Inactive</label>

</div>
<br>


<div class="form-group">
<label>Category</label>

<select name='category_id'>
@foreach($categories as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
</select>

<div class="alert-danger">{{ $errors->first('category_id')}}</div>

</div>

<div class="form-group">
<label>Tag</label>
<select name="tags[]" multiple>
@foreach($tags as $tag)
<option value="{{ $tag->id}}">{{$tag->name}}</option>
@endforeach
</select>
</div>




<input type='submit' value='SUBMIT' name='submit' class="btn btn-primary">

</form>

</div>
</div>
</div>


@endsection
