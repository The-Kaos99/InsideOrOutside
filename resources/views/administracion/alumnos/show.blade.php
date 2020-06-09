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
<div class="row" >
    <div class="col-6 text-center">
        <p>Fecha de Nacimiento : {{$alumno->fech_nac}}</p>
    </div>
    <div class="col-6 text-center" >
        <p>Unidad : {{$alumno->unidad}}</p>
    </div>
</div>
<div class="row text-center">
    <div class="col-md-3 pb-3">
        <a name="volver" id="volver" class="btn btn-primary border border-dark" href="{{ asset("admin/alumnos") }}"
            role="button">Volver</a>
    </div>
    <div class="col-md-3 pb-3">
        {!! Form::open(['url'=>['admin/alumnos/imprimir'] , 'method'=>'post', 'target'=>'_blank']) !!}
            {!! Form::hidden('slug', $alumno->slug) !!}
            {!! Form::submit('Imprimir Carne', ['class'=>"btn btn-info mb-3"]) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-3 pb-3">
        <a name="editar" id="editar" class="btn btn-warning border border-dark"
            href="{{ asset("admin/alumnos") }}/{{$alumno->slug}}/edit" role="button">Editar</a>
    </div>
    <div class="col-md-3 pb-3">
        {!! Form::open(['action'=>['AlumnosController@destroy', $slug=$alumno->slug,] , 'method'=>'DELETE']) !!}
            {!! Form::submit('Eliminar', ['class'=>"btn btn-danger  border border-dark"]) !!}
        {!! Form::close() !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3>Aqui la lista de las interacciones con este usuario</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar border border-dark">
            <div class="form-group pt-4 d-flex justify-content-center">
                <label for="search" class="pt-2 mr-2">Busqueda de Alumnos : </label>
                <input type="text" class="form-control pull-right border border-dark" style="width:20%" id="search" placeholder="Termino">
            </div>
        <table class="table table-bordered table-striped mb-0 text-center" id="mytable">
            <thead>
              <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Nombre</th>
                
                <th scope="col">Unidad</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                    <tr>
                        <th scope="row">{{$registro->fecha}}</th>
                        <td>{{$alumno->nombre}} {{$alumno->apellidos}}</td>
                        <td>{{$alumno->unidad}}</td>
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