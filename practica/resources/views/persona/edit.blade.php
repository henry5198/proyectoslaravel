@extends('persona.layout')

@section('content')

@if ($errors->any())

<div class="alert alert-danger">

<strong>Whoops!</strong> There were some problems with your input.<br><br>

<ul>

@foreach ($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif


<form action="{{ route('personas.update', $persona->id) }}" method="POST">
@csrf
@method('PUT')
    
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nombre:</strong>

                <input type="text" name="nombre" value="{{ $persona->nombre }}" class="form-control" placeholder="Name">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Edad:</strong>

                <input type="number" name="edad" value="{{ $persona->edad }}" class="form-control" placeholder="Name">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>
    
</form>
@endsection