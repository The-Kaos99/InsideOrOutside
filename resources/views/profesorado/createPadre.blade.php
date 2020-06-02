@extends('profesorado.layouts.plantilla')


@section('cabecera')
<?php
    $titulo='Profesorado'
?>
@section('contenido')
@include('common.succes')
@include('common.errors')
<div class="row mb-5 pb-5">
    <div class="col-1"></div>
    <div class="col-10 mb-5 pb-5 mt-5">
        @include('common.errors')
        {!! Form::open(['action'=>['AuxiliarController@storePadre'] , 'method'=>'POST' , 'file'=>true ,'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre :') !!}
                {!! Form::text('nombre', null , ['class'=>'form-control' , 'placeholder'=>"Nombre" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos ') !!}
                {!! Form::text('apellidos', null , ['class'=>'form-control' , 'placeholder'=>"Apellidos" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Correo Electronico')!!}
                {!! Form::email('email', null , ['class'=>'form-control' , 'placeholder'=>"email" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono', 'Telefono :') !!}
                {!! Form::text('telefono', null , ['class'=>'form-control' , 'placeholder'=>"Numero de telefono" ,'required' ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('contra', 'Contraseña ') !!}
                {!! Form::text('contra', null , ['class'=>'form-control' , 'placeholder'=>"Sera enviada por correo" ,'disabled'=>"disabled" ]) !!}
            </div>
            
            <div class="form-group">
                {!! Form::submit('Crear', ['class'=>'btn btn-success ']) !!}
            </div>

        {!! Form::close() !!}
        
    </div>
</div>
@endsection
@section('footer')

@endsection