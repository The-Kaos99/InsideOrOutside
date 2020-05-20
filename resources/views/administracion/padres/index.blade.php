@extends('administracion.layouts.plantilla')
@section('cabecera')
<?php
    $titulo='Creacion y Eliminacion de los Padres de los alumnos';
?>
@endsection
@section('contenido')
@if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
@include("administracion.padres.create_padres")
@include("administracion.padres.list_padres")
@endsection
@section('footer')
@endsection