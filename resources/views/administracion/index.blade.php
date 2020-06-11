@extends('administracion.layouts.plantilla')


@section('cabecera')
<?php
    $titulo='Administración'
?>
@endsection
@section('contenido')
        <div class="row ">
            <div class="col-12 ">
                <h1 class="text-center">Bienvenido</h1>
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
               <p>En este apartado de la plataforma podra realizar diversas acciones generales y tambien en cada usuarios en particular </p>
               <ul>
                   <li>
                       Creacion , elimnacion y edicion del profesorado 
                   </li>
                   <li>
                        Creacion , elimnacion y edicion del alumnado
                    </li>
                    <li>
                        Creacion , elimnacion y edicion de los padres de los alumnos
                    </li>
                    
                    <li>
                        Eliminacion completa de Todos los Datos
                    </li>
               </ul>
            </div>
        </div>
      
        <hr>
        <div class="row mt-5 pt-4">
            <divl class="col-12 mt-2">
                <h2 class="bg-warning text-center p-2 m-1">No se recomieda utilizar el usuario Administrador mas de lo
                    imprescindible </h2>
            </divl>
        </div>
        <div class="row pb-5">
            <div class="col-12 p-5">
                <h2 class="bg-info text-center p-2">Por razones de seguridad puede haber solo un administrador y no podria ser eliminado bajo nigun medio 
                    , se puede cambiar la contraseña mediante la funcion de olvidado la contraseña . </h2>
            </div>
        </div>
        
        {{-- @include("administracion.create_admin") --}}
@endsection
@section('footer')

@endsection
           
   