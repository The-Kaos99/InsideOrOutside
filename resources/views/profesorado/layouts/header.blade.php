<header>
    <div class="row  bg-gradient-success opacidad-10 shadow-lg">
        <div class="col-6">
            <h1>{{ $titulo }}</h1>
        </div>
        <div class="col-6 ">
            <nav class="navbar navbar-expand-md navbar-light ">
                <button class="navbar-toggler d-lg-none ml-auto" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item ">
                        <a class="nav-link bg-primary m-2 opacidad-0 text-light text-center border border-primary" href="{{asset("/profesorado")}}" alt="Hola">Pagina del Profesoreado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary m-2 opacidad-0 text-light text-center border border-primary" href="{{asset("/profesorado/entradas")}}">Entradas</a>
                            
                        </li>
                        <li class="nav-item">
                            {!! Form::open(['action'=>['AuxiliarController@createAlumno'] ]) !!}
                                {!! Form::submit('Crear alumnos', ['class'=>"nav-link btn btn-primary text-light border border-primary m-2"]) !!}
                            {!! Form::close() !!}
                            
                        </li>
                        <li class="nav-item">
                            {!! Form::open(['action'=>['AuxiliarController@createPadre'] ]) !!}
                                {!! Form::submit('Crear Tutores', ['class'=>"nav-link btn btn-primary text-light border border-primary m-2"]) !!}
                            {!! Form::close() !!}
                        </li>
                        <li class="nav-item">
                        
                            {!! Form::open(['route'=>'logout' , 'method'=>'post']) !!}
                               {!! Form::submit('Salir', ['class'=>"btn btn-danger m-2"]) !!}
                            {!! Form::close() !!}
                                                       
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>