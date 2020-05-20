@extends('administracion.layouts.plantilla')
@section('cabecera')
<?php
    $titulo='Creacion y Eliminacion de los Alumnos';
?>
@endsection
@section('contenido')
@if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
@include("administracion.alumnos.create_alumno")
@include("administracion.alumnos.list_alumno")
@endsection
@section('footer')
@endsection