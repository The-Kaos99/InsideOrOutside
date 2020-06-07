@extends('administracion.layouts.plantilla')
@section('cabecera')
<!--{{$titulo=$alumno->nombre." ".$alumno->apellidos}}-->
@endsection
@section('contenido')
<div class="row">
    <div class="col-12">
        <img src="{{ asset("images") }}/{{$alumno->imagen}}" class="rounded-circle mx-auto d-block" alt="" width="275" height="275">
        <div class="text-center">
            {!! Form::open(['action'=>['AlumnosController@destroy', $slug=$alumno->slug,] , 'method'=>'DELETE']) !!}
                {!! Form::button('Eliminar', ['class'=>"btn btn-danger  border border-dark mt-2"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="row pb-5">
    <div class="col-1"></div>
    <div class="col-10 ">
        {!! Form::open(['action'=>['AlumnosController@update', $slug=$alumno->slug] , 'method'=>'PUT' , 'file'=>true ,'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del Alumno') !!}
                {!! Form::text('nombre', $alumno->nombre, ['class'=>'form-control' , 'placeholder'=>"Nombre del Alumno" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos del Alumno') !!}
                {!! Form::text('apellidos', $alumno->apellidos , ['class'=>'form-control' , 'placeholder'=>"Apellidos del Alumno" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fech_nac', 'Fecha de Nacimiento') !!}
                {!! Form::date('fech_nac', $alumno->fech_nac, ['class'=>'form-control', 'required'] )!!}
            </div>
            <div class="form-group">
                {!! Form::label('unidad', 'Unidad del Alumno') !!}
                {!! Form::text('unidad', $alumno->unidad , ['class'=>'form-control' , 'placeholder'=>"Unidad del Alumno" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('curso', 'Curso') !!}
                {!! Form::text('curso', $alumno->curso , ['class'=>'form-control' , 'placeholder'=>"curso" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('imagen', 'Imagen del Alumno') !!}
                {!! Form::file('imagen' , ['class'=>'form-control pb-5 pt-3']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Guardar Alumno', ['class'=>'btn btn-success ']) !!}
                <a name="volver" id="volver" class="btn btn-primary border border-dark" href="{{ url()->previous() }}" role="button">Volver</a>
            </div>

        {!! Form::close() !!}
        
        
        <div class="col-1"></div>
    </div>
</div> 
@endsection
@section('footer')
@endsection