@extends('administracion.layouts.plantilla')
@section('cabecera')
<!--{{$titulo=$padre->nombre." ".$padre->apellidos}}-->
@endsection
@section('contenido')
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        {!! Form::open(['action'=>['PadresController@update', $id=$padre->id] ,'method'=>'PUT' , 'file'=>true ,'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre :') !!}
                {!! Form::text('nombre', $padre->nombre , ['class'=>'form-control' , 'placeholder'=>"Nombre" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos ') !!}
                {!! Form::text('apellidos', $padre->apellidos , ['class'=>'form-control' , 'placeholder'=>"Apellidos" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono', 'Telefono :') !!}
                {!! Form::text('telefono', $padre->telefono , ['class'=>'form-control' , 'placeholder'=>"Numero de telefono"  ]) !!}
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
<div class="row pb-5">
    <div class="col-12 text-center">
        {!! Form::open(['action'=>['ProfesoresController@destroy', $id=$padre->id,] , 'method'=>'DELETE']) !!}
            {!! Form::submit('Eliminar', ['class'=>"btn btn-danger mb-3"]) !!}
          {!! Form::close() !!}
          <p class="mt-5  border border-warning alert-warning">*En caso de querer cambiar el correo electronico se tendra que borrar el usuario y crearlo de nuevo por seguridad</p>
    </div>
</div>
<div class="row mt-5 pb-5 text-center">
</div>
@endsection
@section('footer')
@endsection