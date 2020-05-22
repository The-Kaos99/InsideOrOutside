<div class="row pb-3">
    <div class="col-6 border">
        <h2 class="text-center">
            Creacion de Administradores
        </h2>
       {!! Form::open(['action'=>'AdministracionController@index' , 'method'=>'POST' , 'file'=>true ,'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre ') !!}
                {!! Form::text('nombre', null , ['class'=>'form-control' , 'placeholder'=>"Nombre " , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Correo Electronico')!!}
                {!! Form::email('email', null , ['class'=>'form-control' , 'placeholder'=>"email" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Crear Administrador', ['class'=>'btn btn-success ']) !!}
            </div>

        {!! Form::close() !!}
        
        
        
    </div>
    <div class="col-6 border text-center">
        <h2> Lista de Administradores</h2>
        <h4>Por defecto 
            <ul>
                <li>admin@insideoroutside.site : Qwerty99</li>
            </ul>
        </h4>
    </div>
</div> 