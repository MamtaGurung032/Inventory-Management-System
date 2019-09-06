@extends('layouts.app')


@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<h2>Categories List</h2>
<a href="{{url('/categories/add')}}" class='btn btn-primary'>Add categories</a>
<br>

@if(session()->has('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif
<br>

<form method='POST' action="{{url('/categories/search')}}">
@csrf
<input type='text' name='name'>
<input type='submit' name='submit' value='Submit'>
</form>

<br>
<br>

<?php
/*
foreach($tasks as $task)
{
    echo $task.'<br>';
}
*/
?>
{{-- //this is comment 
@foreach($categories as $category)
{{$category}}
@endforeach 
--}}


<table border=1 class='table table-striped'>
<tr>
<th>Id</th>
<th>Name</th>
<th>Status</th>
<th>Actions</th>
</tr>


 
@foreach($categories as $category)
<tr>
<td>{{$category['id']}}</td>
<td>{{$category['name']}}</td>
<td>
@if($category['status'] == 1)
Active
@else
Inactive
@endif
</td>

<td><a href="{{url('/categories/'. $category->id. '/edit')}}">Edit</a>  
    
    
    <form method="POST" action="{{url('/categories/' . $category->id )}}">
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