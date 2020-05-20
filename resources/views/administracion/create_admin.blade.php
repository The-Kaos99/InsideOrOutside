<div class="row pb-3">
    <div class="col-1"></div>
    <div class="col-10 opacidad-0">
       {!! Form::open(['action'=>'AdministracionController@index' , 'method'=>'POST' , 'file'=>true ,'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('nombre_alumno', 'Nombre del Alumno') !!}
                {!! Form::text('nombre_alumno', null , ['class'=>'form-control' , 'placeholder'=>"Nombre del Alumno" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos_alumno', 'Apellidos del Alumno') !!}
                {!! Form::text('apellidos_alumno', null , ['class'=>'form-control' , 'placeholder'=>"Apellidos del Alumno" , 'required']) !!}
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
                {!! Form::label('img_alumno', 'Imagen del Alumno') !!}
                {!! Form::file('img_alumno' , ['class'=>'form-control pb-5 pt-3' ,  'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Crear Alumno', ['class'=>'btn btn-success ']) !!}
            </div>

        {!! Form::close() !!}
        
        
        <div class="col-1"></div>
    </div>
</div> 