
<div class="row pb-5">
    <div class="col-12">
        <h2 class="text-center">Creacion del Alumnado</h2>
    </div>
</div>


<div class="row pb-3">
    <div class="col-1"></div>
    <div class="col-10 opacidad-0">
        @include('common.errors')
       {!! Form::open(['action'=>'AlumnosController@store' , 'method'=>'POST' , 'file'=>true ,'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del Alumno') !!}
                {!! Form::text('nombre', null , ['class'=>'form-control' , 'placeholder'=>"Nombre" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos del Alumno') !!}
                {!! Form::text('apellidos', null , ['class'=>'form-control' , 'placeholder'=>"Apellidos" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fech_nac', 'Fecha de Nacimiento') !!}
                {!! Form::date('fech_nac', null, ['class'=>'form-control', 'required'] )!!}
            </div>
            <div class="form-group">
                {!! Form::label('unidad', 'Unidad del Alumno') !!}
                {!! Form::text('unidad', null , ['class'=>'form-control' , 'placeholder'=>"Unidad del Alumno" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('curso', 'Curso') !!}
                {!! Form::text('curso', null , ['class'=>'form-control' , 'placeholder'=>"curso" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('imagen', 'Imagen del Alumno') !!}
                {!! Form::file('imagen' , ['class'=>'form-control pb-5 pt-3' ,  'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Crear Alumno', ['class'=>'btn btn-success ']) !!}
            </div>
        {!! Form::close() !!}
        
        
        <div class="col-1"></div>
    </div>
</div> 

<div class="row">
    <div class="col-6 text-center"><h3>Eliminar todos los alumnos</h3></div>
        <div class="col-6">
            {!! Form::open(['action'=>['AlumnosController@destroy', $slug='allDelete',] , 'method'=>'DELETE']) !!}
                {!! Form::submit('Eliminar', ['class'=>"btn btn-danger mb-3"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
<hr>