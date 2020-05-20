        <div class="row">
            <div class="col-12"><h2 class="text-center">Creacion del Profesorado</h2></div>
        </div>
        <div class="row pb-5">
            <div class="col-1"></div>
            <div class="col-10 opacidad-0">
                @include('common.errors')
        {!! Form::open(['action'=>'ProfesoresController@store' , 'method'=>'POST' , 'file'=>true ,'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre :') !!}
                {!! Form::text('nombre', null , ['class'=>'form-control' , 'placeholder'=>"Nombre" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos ') !!}
                {!! Form::text('apellidos', null , ['class'=>'form-control' , 'placeholder'=>"Apellidos" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Correo Electronico')!!}
                {!! Form::email('email', null , ['class'=>'form-control' , 'placeholder'=>"email" , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('contra', 'Contraseña ') !!}
                {!! Form::text('contra', null , ['class'=>'form-control' , 'placeholder'=>"Sera enviada por correo" ,'disabled'=>"disabled" ]) !!}
            </div>
            
            <div class="form-group">
                {!! Form::submit('Crear', ['class'=>'btn btn-success ']) !!}
            </div>

        {!! Form::close() !!}
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="col-6 text-center"><h3>Eliminar todos los profesores</h3></div>
                <div class="col-6">
                    {!! Form::open(['action'=>['ProfesoresController@destroy', $slug='allDelete',] , 'method'=>'DELETE']) !!}
                        {!! Form::submit('Eliminar', ['class'=>"btn btn-danger mb-3"]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        <hr>
       
