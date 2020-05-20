@extends('administracion.layouts.plantilla')
@section('cabecera')
<!--{{$titulo=$alumno->nombre." ".$alumno->apellidos}}-->
@endsection
@section('contenido')
<div class="row">
    <div class="col-12">
        <img src="{{ asset("images") }}/{{$alumno->imagen}}" class="rounded-circle mx-auto d-block" alt="" width="300"
            height="300">
    </div>
</div>


<div class="row">
    <div class="col-12">
        <h2 class="text-center">{{$alumno->nombre}} {{$alumno->apellidos}}</h2>
    </div>
</div>
<div class="row ">
    <div class="col-12 d-flex justify-content-center">
        <h2 class="text-center">
            <?php print DNS1D::getBarcodeHTML($alumno->slug, 'C128');?>
            {{$alumno->slug}}
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-6 text-center">
        <p>Fecha de Nacimiento : {{$alumno->fech_nac}}</p>
    </div>
    <div class="col-6 text-center">
        <p>Unidad : {{$alumno->unidad}}</p>
    </div>
</div>
<div class="row text-center">
    <div class="col-4">
        <a name="volver" id="volver" class="btn btn-primary border border-dark" href="{{ asset("admin/alumnos") }}"
            role="button">Volver</a>
    </div>
    <div class="col-4">
        <a name="editar" id="editar" class="btn btn-warning border border-dark"
            href="{{ asset("admin/alumnos") }}/{{$alumno->slug}}/edit" role="button">Editar</a>
    </div>
    <div class="col-4">
        {!! Form::open(['action'=>['AlumnosController@destroy', $slug=$alumno->slug,] , 'method'=>'DELETE']) !!}
            {!! Form::submit('Eliminar', ['class'=>"btn btn-danger  border border-dark"]) !!}
        {!! Form::close() !!}
    </div>

</div>


@endsection
@section('footer')
@endsection