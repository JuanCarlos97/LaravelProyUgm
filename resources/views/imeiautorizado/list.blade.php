@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}


</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <div class="row">
        <div class="col">
            <h1 class="animated rubberBand">Lista de imei autorizados</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('imeiautorizado.create')}}"
                    class="btn btn-success btn-block animated rubberBand">NUEVO IMEI</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table table-dark animated fadeInUp">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">FUNCIONARIO</th>
            <th scope="col">ELECCIÓN</th>
            <th scope="col">CASILLA</th>
            <th scope="col">IMEI</th>
            
            <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>

            <!-- RECORRIDO DE TABLA imeiautorizado -->
            @foreach($imeiautorizados as $imeiautorizado)
                <!-- RECORRIDO DE TABLA funcionario para estetica web -->
                @foreach($funcionarios as $funcionario)
                    @if($imeiautorizado->funcionario_id === $funcionario->id)
                        @php ($nombre = $funcionario->nombrecompleto)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA eleccion para estetica web -->
                @foreach($elecciones as $eleccion)
                    @if($imeiautorizado->eleccion_id === $eleccion->id)
                        @php($laeleccion = $eleccion->periodo)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA casilla para estetica web -->
                @foreach($casillas as $casilla)
                    @if($imeiautorizado->casilla_id === $casilla->id)
                        @php($lacasilla = $casilla->ubicacion)
                        @break;
                    @endif
                @endforeach


            <tr>
                <td>{{$imeiautorizado->id}}</td>
                <td>{{$nombre}}</td>
                <td>{{$laeleccion}}</td>
                <td>{{$lacasilla}}</td>
                <td>{{$imeiautorizado->imei}}</td>
                
                <td><a href="{{ route('imeiautorizado.edit', $imeiautorizado->id)}}"
                class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{ route('imeiautorizado.destroy', $imeiautorizado->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$imeiautorizado->id}}')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection