@extends('administracion.layouts.plantilla')
@section('cabecera')
<?php
    $titulo='Creacion y Eliminacion de los Profesores';
?>
@endsection
@section('contenido')
@include('common.succes')
@include('common.errors')
@include("administracion.profesores.create_profe")
@include("administracion.profesores.list_profe")
@endsection
@section('footer')
@endsection