<div class="row pb-2">
    <div class="col-12">
        <h2 class="text-center">Lista de Padres</h2>
    </div>
</div>
<div class="row">
    
    <div class=" col-12 d-flex justify-content-center ">
        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar border border-dark">
            <div class="form-group pt-4 d-flex justify-content-center">
                <label for="search" class="pt-2 mr-2">Busqueda de Padres : </label>
                <input type="text" class="form-control pull-right border border-dark" style="width:20%" id="search" placeholder="Termino">
            </div>
        <table class="table table-bordered table-striped mb-0 text-center" id="mytable">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col" colspan="2">Accion</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($padres as $padre)
                    <tr>
                        <th scope="row">{{$padre->nombre}} {{$padre->apellidos}}</th>
                        <td> <a href="tel:+34{{$padre->telefono}}">{{$padre->telefono}}</a></td>
                        <td> <a href="mailto:{{$padre->email}}">{{$padre->email}}</a></td>
                        <td><a name="editar" id="editar" class="btn btn-warning border border-dark"
                            href="{{ asset("admin/padres") }}/{{$padre->id}}/edit" role="button">Editar</a></td>
                        <td > 
                            {!! Form::open(['action'=>['PadresController@destroy', $id=$padre->id,] , 'method'=>'DELETE']) !!}
                                {!! Form::submit('Eliminar', ['class'=>"btn btn-danger mb-3"]) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
