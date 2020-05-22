@extends('administracion.layouts.plantilla')
@section('cabecera')
<!--{{$titulo=$profesor->nombre." ".$profesor->apellidos}}-->
@endsection
@section('contenido')
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        @include('common.errors')
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
                {!! Form::submit('Guardar', ['class'=>'btn btn-success border border-dark']) !!}                
                <a name="volver" id="volver" class="btn btn-primary border border-dark" href="{{ url()->previous() }}" role="button">Volver</a>
            </div>
        {!! Form::close() !!}
        
    </div>
</div>
<div class="row pb-5">
    <div class="col-12 text-center">
        {!! Form::open(['action'=>['ProfesoresController@destroy', $id=$profesor->id,] , 'method'=>'DELETE']) !!}
            {!! Form::submit('Eliminar', ['class'=>"btn btn-danger mb-3"]) !!}
          {!! Form::close() !!}
          <p class="mt-5  border border-warning alert-warning">*En caso de querer cambiar el correo electronico se tendra que borrar el usuario y crearlo de nuevo por seguridad</p>
    </div>
</div>
<div class="row mt-5 pb-5 text-center">
    <div class="col-1"></div>
    <div class="col-10  mt-5 pb-5">
        
    </div>
</div>
@endsection
@section('footer')
@endsection