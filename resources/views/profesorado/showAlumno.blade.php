@extends('profesorado.layouts.plantilla')
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
    <div class="col-md-6">
        {!! Form::open(['url'=>['profesorado/alumnos/imprimir'] , 'method'=>'post']) !!}
            {!! Form::hidden('slug', $alumno->slug) !!}
            {!! Form::submit('Imprimir Carne', ['class'=>"btn btn-info mb-3"]) !!}
         {!! Form::close() !!}
    </div>
    <div class="col-md-6">
        <a name="volver" id="volver" class="btn btn-primary border border-dark" href="{{ url()->previous() }}"
            role="button">Volver</a>
    </div>
</div>


@endsection
@section('footer')
@endsection