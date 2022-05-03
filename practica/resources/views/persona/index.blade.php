@extends('persona.layout')

@section('content')

<div class="row">

<div class="col-lg-12 margin-tb">

<div class="pull-left">

<h2>Lista de Personas</h2>

</div>

<div class="pull-right">

<a class="btn btn-success" href="{{ route('personas.create') }}"> Create New Person</a>

</div>

</div>

</div>



<table class="table table-bordered">

<tr>

<th>No</th>

<th>Nombre</th>

<th>Edad</th>

<th width="280px">Action</th>

</tr>

@foreach ($personas as $persona)

<tr>

<td>{{ 1 }}</td>

<td>{{ $persona->nombre }}</td>

<td>{{ $persona->edad }}</td>

<td>

<form action="{{ route('personas.destroy',$persona->id) }}" method="POST">

<a class="btn btn-info" href="{{ route('personas.show',$persona->id) }}">Show</a>

<a class="btn btn-primary" href="{{ route('personas.edit',$persona->id) }}">Edit</a>

@csrf

@method('DELETE')

<button type="submit" class="btn btn-danger">Delete</button>

</form>

</td>

</tr>

@endforeach

</table>

{!! $personas->links() !!}

@endsection


