@extends('administracion.layouts.plantilla')
@section('cabecera')
<!--{{$titulo=$profesor->nombre." ".$profesor->apellidos}}-->
@endsection
@section('contenido')
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        {!! Form::open(['action'=>['ProfesoresController@update', $id=$profesor->id] ,'method'=>'PUT' , 'file'=>true ,'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre :') !!}
                {!! Form::text('nombre', $profesor->nombre , ['class'=>'form-control' , 'placeholder'=>"Nombre" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos ') !!}
                {!! Form::text('apellidos', $profesor->apellidos , ['class'=>'form-control' , 'placeholder'=>"Apellidos" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Correo Electronico')!!}
                {!! Form::email('email', $profesor->email , ['class'=>'form-control' , 'placeholder'=>"email" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('contra', 'Contraseña : ') !!}
                <input type="password" class="form-control" id="contra" placeholder="Indroduzca clave">
                
            </div>            
            <div class="form-group">
                {!! Form::submit('Guardar', ['class'=>'btn btn-success border border-dark']) !!}
                
                <a name="volver" id="volver" class="btn btn-primary border border-dark" href="{{ url()->previous() }}" role="button">Volver</a>
            </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection
@section('footer')
@endsection