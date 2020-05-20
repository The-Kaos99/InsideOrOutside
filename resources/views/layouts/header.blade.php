<header>
    <div class="row bg-gradient-success opacidad-10 shadow-lg">
        <div class="col-8 mt-1">
           <h1 > <a class="stretched-link text-dark" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            
        </div>
        <div class="col-4 ">
            <nav class="navbar navbar-expand-md navbar-light ">
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link bg-primary m-2 opacidad-0 text-light text-center border border-primary" href="{{ asset("/")}}" alt="Hola">Pagina Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary m-2 opacidad-0 text-light text-center border border-primary" href="{{ asset("/primeros_pasos")}}">Primeros pasos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link bg-primary m-2 opacidad-0 text-light text-center border border-primary" href="{{ asset("/login")}}">Iniciar Sesion</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>