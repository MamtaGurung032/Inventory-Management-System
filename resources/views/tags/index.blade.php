@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


<h2>Tag List</h2>

<a href="{{url('/tags/add')}}" class='btn btn-primary'>Add tags</a><br><br>

<table border=1>

<tr>
<th>Id</th>
<th>Name</th>
<th>Actions</th>
</tr>


@foreach($tags as $tag)
<tr>
<td>{{ $tag['id']}}</td>
<td>{{ $tag['name']}}</td>
<td>
<a href="{{url( '/tags/' . $tag->id . '/edit' )}}">Edit</a>

<form method='post' action="{{url('/tags'. $tag->id)}}">
@csrf
@method('delete')
<input type="submit" value="Delete" class="btn btn-primary">
</form>

</td>
</tr>
@endforeach

</table>

</div>
</div>
</div>


@endsection
