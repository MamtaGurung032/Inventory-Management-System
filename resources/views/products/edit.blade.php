@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h2>Edit Products</h2>
<form method='POST' action="{{url('/products/'.$product->id)}}">

@csrf
@method('put')

<div class="form-group">
<label>Name</label>
<input type='text' name='name' value="{{ old('name', $product->name) }}" class="form-control" placeholder="Enter name">  
<div class="alert-danger">{{ $errors->first('name')}}</div>
</div>

<div class="form-group">
<label>Description</label>
<input type='text' name='description' value="{{$product->description}}" class="form-control" placeholder="Enter description">
<div class="alert-danger">{{ $errors->first('description')}}</div>

</div>



<div class="form-group">
<label>Price</label>
<input type='text' name='price' value="{{$product->price}}" class="form-control" placeholder="Enter price">
<div class="alert-danger">{{ $errors->first('price')}}</div>

</div>


<div class="form-group">
<label>Category</label>
<select name='category_id'>
@foreach($categories as $category)


  <option value="{{ $category->id }}" 
  @if($category->id == $product->category_id)
    selected
  @endif>  
  {{ $category->name }}</option>
    

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

<div class='form-group'>
<label>Status</label>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio1" name="status" class="custom-control-input" value=1 
  @if($product->status == 1)
   checked 
  @endif
  >
  <label class="custom-control-label" for="customRadio1" >Active</label>
</div>

<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="status" class="custom-control-input" value=0 
  @if($product->status == 0)
   checked 
  @endif  
  >
  <label class="custom-control-label" for="customRadio2">Inactive</label>
</div>
</div>
<br>


<input type='submit' value='submit' name='submit' class="btn btn-primary">

</form>

</div>          
</div>
</div>
@endsection