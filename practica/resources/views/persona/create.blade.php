@extends('persona.layout')

@section('content')
<form action="{{ route('personas.store') }}" method="POST">

    @csrf
    
        <div class="row">
    
            <div class="col-xs-12 col-sm-12 col-md-12">
    
                <div class="form-group">
    
                    <strong>Nombre:</strong>
    
                    <input type="text" name="nombre" class="form-control" placeholder="Name">
    
                </div>
    
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
    
                <div class="form-group">
    
                    <strong>Edad:</strong>
    
                    <input type="number" name="edad" class="form-control" placeholder="Name">
    
                </div>
    
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    
                <button type="submit" class="btn btn-primary">Submit</button>
    
            </div>
    
        </div>
    
    </form>
    
    @endsection