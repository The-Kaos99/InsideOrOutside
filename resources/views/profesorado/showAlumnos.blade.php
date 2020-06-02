@extends('profesorado.layouts.plantilla')
@section('cabecera')
<!--{{$titulo='Listado de alumnos'}}-->
@endsection
@section('contenido')
<div class="row">
    <div class="col-12">
        <div class="table-responsive table-wrapper-scroll-y border border-dark">
            <div class="form-group pt-4 d-flex justify-content-center">
                <label for="search" class="pt-2 mr-2">Busqueda de Alumnos : </label>
                <input type="text" class="form-control pull-right border border-dark" style="width:20%" id="search" placeholder="Termino">
            </div>
        <table class="table table-bordered table-striped mb-0 text-center" id="mytable">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Unidad</th>
                <th scope="col" colspan="2" >Accion </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <th scope="row">{{$alumno->id}}</th>
                        <td> <img class="rounded-circle mx-auto d-block" src="{{ asset("images") }}/{{$alumno->imagen}}" alt="" srcset="" width="100" height="75"></td>
                        <td>{{$alumno->nombre}}</td>
                        <td>{{$alumno->apellidos}}</td>
                        <td>{{$alumno->unidad}}</td>
                        <td ><!--<a href="{{ asset("profesorado/alumnos") }}/{{$alumno->slug}}" class="btn btn-primary mb-3">Ver más...</a>  -->
                            {!! Form::open(['action'=>['ZonaProfeController@show', 'alumnos'] , 'method'=>'GET']) !!}
                                {!! Form::hidden('alumno',$alumno->slug ) !!}
                                {!! Form::submit('Ver más...', ['class'=>"btn btn-primary mb-3  border border-dark m-3"]) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>                      
                            {!! Form::open(['action'=>['ZonaProfeController@destroy', 'alumnos'] , 'method'=>'DELETE']) !!}
                                {!! Form::hidden('alumno',$alumno->slug ) !!}
                                {!! Form::submit('Eliminar', ['class'=>"btn btn-danger mb-3 border border-dark m-3"]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>


@endsection
@section('footer')
@endsection