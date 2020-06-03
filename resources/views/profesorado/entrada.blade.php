@extends('profesorado.layouts.plantilla')

@section('cabecera')
<?php
    $titulo='Primeros Pasos';
?>
@endsection

@section('contenido')
<div class="row ">
    <div class="col-12">
        {!! Form::open(['action'=>'SalidasController@showAlumno' , 'method'=>'POST' ]) !!}
        @csrf
            <div class="form-group">
                {!! Form::label('codig_baras', 'Escanar el codigo de barras') !!}
                {!! Form::text('codig_baras', null , ['class'=>'form-control' , 'placeholder'=>"Codigo " , 'required']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::submit('Validar', ['class'=>'btn btn-success ']) !!}
            </div>
        {!! Form::close() !!}
       
    </div>
</div>
@if ($alumno ?? '')
<div class="row justify-content-center mt-3">
    <div class="col-12 text-center">
        <div class="card" >
            <h3 class="card-title">{{$alumno->nombre}} {{$alumno->apellidos}}   </h3>
            <h4>Curso : {{$alumno->unidad}}</h4>
            
            <img class=" rounded-circle mx-auto d-block" src="{{ asset("images") }}/{{$alumno->imagen}}" alt="Card image cap" width="300"
            height="300">
            <h4 class="bg-warning">
                Fecha Nacimiento : {{$alumno->fech_nac}}
            </h4>
            <div class=" d-flex justify-content-center mt-3">
                <h2 class="text-center">
                    <?php print DNS1D::getBarcodeHTML($alumno->slug, 'C128');?>
                    {{$alumno->slug}}
                    
                </h2>
            </div>
            <div class="card-body">
              
              
            </div>
          </div>
    </div>
</div>
@endif

<script>
    //keyupp
</script>
@endsection
@section('footer')
@endsection
