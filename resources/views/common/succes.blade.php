@if (session('status'))
    @if (session('status')==='Ya existe un usuario con este correo')
        <div class="alert alert-danger">
            {{session('status')}}
        </div>
    @else
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    
@endif