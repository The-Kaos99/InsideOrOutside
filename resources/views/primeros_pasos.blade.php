@extends('layouts.plantilla')

@section('cabecera')
<?php
    $titulo='Primeros Pasos';
?>
@endsection

@section('contenido')
<div class="row ">
    <div class="col-12">
        <h2>Bienvenidos aquí les explicare como funciona esta web y como tendrán que solicitar el acceso a ella
        </h2>
        <p>Esta aplicacion web nos permite estas cosas:</p>
        <ul>
            <li>Control de entrada y salida de los alumnos del centro educativo </li>
            <li>Generar informes de esas salidas y entradas semanales que son enviados a los tutores de los alumnos que estan dados de alta</li>
            <li>Permitir la consulta de la lista de entradas y salidas a los profesores de los alumnos en tiempo real </li>
            <li>Permitir a los profesores restringir la salida y entrada de alumnos por diversos motivos </li>
        </ul>
    </div>
</div>
@endsection

