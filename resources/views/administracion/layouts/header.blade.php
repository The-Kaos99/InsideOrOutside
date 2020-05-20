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
                        <a class="nav-link bg-primary m-2 opacidad-0 text-light text-center border border-primary" href="{{asset("/admin")}}" alt="Hola">Pagina de Administracion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary m-2 opacidad-0 text-light text-center border border-primary" href="{{asset("admin/profesores")}}">Profesores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary m-2 opacidad-0 text-light text-center border border-primary" href="{{asset("admin/alumnos")}}">Alumnos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary m-2 opacidad-0 text-light text-center border border-primary" href="{{asset("admin/padres")}}">Tutores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-danger m-2 opacidad-0 text-light text-center border border-primary" href="{{asset("/")}}"
                                 ">Salir</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>