@extends('layouts.plantilla')

@section('cabecera')
<?php
    $titulo='Primeros Pasos';
?>
@endsection

@section('contenido')
<div class="row ">
    <div class="col-12">
        {!! Form::open(['action'=>'SalidasController@showAlumno' , 'method'=>'POST' ]) !!}
            <div class="form-group">
                {!! Form::label('codig_baras', 'Escanar el codigo de barras') !!}
                {!! Form::text('codig_baras', null , ['class'=>'form-control' , 'placeholder'=>"Codigo " , 'required']) !!}
            </div>
        {!! Form::close() !!}
       <!-- <div class="input-group">
            <input type="text" class="form-control" name="" id="texto" placeholder="ingresde nomnbre" >
            <div class="input-group-append">
                <span class="input-group-text">Buscar</span>
            </div>
        </div>-->
    </div>
</div>
<div class="row justify-content-center mt-3">
    <div class="col-12 text-center">
        <div class="card" >
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>
</div>
<script>
    //keyupp
</script>
@endsection
@section('footer')
@endsection