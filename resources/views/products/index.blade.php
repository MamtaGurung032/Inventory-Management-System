@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



<h2>Products List</h2>


{{-- @foreach($products as $product)
{{$product}}
@endforeach --}}


<a href="{{url('/products/add')}}" class='btn btn-primary'>Add product</a><br>

@if(session()->has('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

<br>        


<form method='POST' action="{{url('/products/search')}}">
@csrf
<input type='text' name='name'>
<input type='submit' value='Submit' name='submit' class='btn btn-primary'> 
</form>
<br>
<br>




<table border=1 class="table table-striped">



<tr>
<th>Id</th>
<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>Status</th>
<th>Category</th>
<th>Tag</th>

<th>Actions</th>
</tr>

@foreach($products as $product)

<tr>
<td>{{$product['id']}}</td>
<td>{{$product['name']}}</td>
<td>{{$product['description']}}</td>
<td>{{$product['price']}}</td>
<td>
@if($product['status'] == 1)
Active
@else
Inactive
@endif
</td>

<td><a href="{{url('/categories/'. $product->category_id)}}">{{optional($product->category)->name}}</a></td>


<td>
@foreach($product->tags as $tag)
<a href="{{url('/tags/'. $tag->id)}}">{{$tag->name}}</a>
@endforeach
</td>


<td><a href="{{url('/products/'. $product->id. '/edit')}}">Edit</a> 

    
    <form method="POST" action="{{url('/products/' . $product->id)}}">
    @csrf
    @method('delete')
    <input type="submit" value="Delete" class='btn btn-primary' onClick="return confirm('Are you sure to delete the existing record?')">
    </form>
    
    
</td>




</tr>
@endforeach

</table>
</div>
</div>
</div>


@endsection

