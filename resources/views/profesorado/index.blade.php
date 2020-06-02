@extends('profesorado.layouts.plantilla')


@section('cabecera')
<?php
    $titulo='Profesorado'
?>
@section('contenido')
<div class="row ">
    <div class="col-12 ">
        <h1 class="text-center">Bienvenido Profesores</h1>
    </div>
</div>

<div class="row pb-5 pt-5">
    <div class="col-12 pt-5 pb-5">
        <p class=" ">En esta zona los profesores podran realizar las siguientes acciones : </p>
        <ul>
            <li>
                 Creacion , elimnacion y edicion del alumnado
             </li>
             <li>
                 Creacion , elimnacion y edicion de los padres de los alumnos
             </li> 
             <li>
                 Revision de la informacion generada por los alumnos 
            </li>            
            <li>
                Descarga del carne del alumno
            </li>             
        </ul>
        <p>A continacion tendra diferentes botones para realizar las acciones que desee </p>
    </div>
</div>
<div class="row d-flex justify-content-around pt-5 pb-5 mb-5 mt-5">
    <div class="col-md-4 mt-3">
        {!! Form::open(['action'=>['ZonaProfeController@show', 'alumnos'] , 'method'=>'GET']) !!}
            {!! Form::hidden('alumno', 'all') !!}
            {!! Form::submit('Mostrar Todos los Alumnos', ['class'=>"btn-lg btn-info  border border-dark m-3"]) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-4 mt-3">
        {!! Form::open(['action'=>['ZonaProfeController@show', 'padres'] , 'method'=>'GET']) !!}
            {!! Form::hidden('padres', 'all') !!}
            {!! Form::submit('Mostrar Todos los Tutoress', ['class'=>"btn-lg btn-info  border border-dark m-3"]) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-4 mt-3">
        {!! Form::open(['action'=>['AuxiliarController@showRegistro', 'registros'] , 'method'=>'GET']) !!}
            {!! Form::submit('Mostrar Todos los Registros', ['class'=>"btn-lg btn-info  border border-dark m-3"]) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection
@section('footer')

@endsection
           
   