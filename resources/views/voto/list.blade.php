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
            <h1 class="animated rubberBand">Votos</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('voto.create')}}"
                    class="btn btn-dark btn-block btn-sm mt-3 animated rubberBand">Nuevo voto</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table table-striped table-dark animated fadeInUp">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">ELECCION</th>
            <th scope="col">CASILLA</th>
            <th scope="col">EVIDENCIA</th>
            <th colspan="2">Controles</th>
            </tr>
        </thead>
        <tbody>

            <!-- RECORRIDO DE TABLA eleccioncomite -->
            @foreach($votos as $voto)
                <!-- RECORRIDO DE TABLA eleccion para estetica web -->
                @foreach($elecciones as $eleccion)
                    @if($voto->eleccion_id === $eleccion->id)
                        @php ($periodo = $eleccion->periodo)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA casilla para estetica web -->
                @foreach($casillas as $casilla)
                    @if($voto->casilla_id === $casilla->id)
                        @php($name = $casilla->ubicacion)
                        @break;
                    @endif
                @endforeach
            

            <tr>
                <td>{{$voto->id}}</td>
                <td>{{$periodo}}</td>
                <td>{{$name}}</td>
                <td>{{$voto->evidencia}}</td>
                <td><a href="{{ route('voto.edit', $voto->id)}}"
                class="btn btn-primary"><i class="fas fa-pen"></i></a></td>
                <td>
                    <form action="{{ route('voto.destroy', $voto->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$voto->id}}')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection