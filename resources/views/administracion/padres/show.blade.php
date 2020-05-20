@extends('administracion.layouts.plantilla')
@section('cabecera')
<!--{{$titulo=$padre->nombre." ".$padre->apellidos}}-->
@endsection
@section('contenido')
<div class="row">
    <div class="col-12">
    </div>
</div>


<div class="row">
    <div class="col-12">
        <h2 class="text-center">{{$padre->nombre}} {{$padre->apellidos}}</h2>
    </div>
</div>

<div class="row">
    <div class="col-6 text-center">
    <p>Contactacto :  <a href="mailto:{{$padre->email}}">{{$padre->email}}</a></p>
    </div>
    <div class="col-6 text-center">
        <p>Curso y Grupo : {{$padre->email}} {{$padre->grupo}}</p>
        </div>
</div>

    <div class="row text-center">
        <div class="col-4">
            <a name="volver" id="volver" class="btn btn-primary border border-dark" href="{{ asset("admin/padres") }}"
                role="button">Volver</a>
        </div>
        <div class="col-4">
            <a name="editar" id="editar" class="btn btn-warning border border-dark"
                href="{{ asset("admin/padres") }}/{{$padre->id}}/edit" role="button">Editar</a>
        </div>
        <div class="col-4">
            {!! Form::open(['action'=>['PadresController@destroy', $id=$padre->id,] , 'method'=>'DELETE']) !!}
                {!! Form::submit('Eliminar', ['class'=>"btn btn-danger  border border-dark"]) !!}
            {!! Form::close() !!}
        </div>
</div>



@endsection
@section('footer')
@endsection