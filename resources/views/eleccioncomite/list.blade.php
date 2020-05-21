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
            <h1 class="animated rubberBand">Elección de comites</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('eleccioncomite.create')}}"
                    class="btn btn-dark btn-block btn-sm mt-3 animated rubberBand">Nuevo registro</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table table-striped table-dark animated fadeInUp">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">ELECCION</th>
            <th scope="col">FUNCIONARIO</th>
            <th scope="col">ROL</th>
            <th colspan="2">Controles</th>
            </tr>
        </thead>
        <tbody>

            <!-- RECORRIDO DE TABLA eleccioncomite -->
            @foreach($elecciones as $eleccioncomite)

                <!-- RECORRIDO DE TABLA eleccion para estetica web -->
                @foreach($eleccioness as $eleccion)
                    @if($eleccioncomite->eleccion_id === $eleccion->id)
                        @php ($periodo = $eleccion->periodo)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA funcionario para estetica web -->
                @foreach($funcionarios as $funcionario)
                    @if($eleccioncomite->funcionario_id === $funcionario->id)
                        @php($name = $funcionario->nombrecompleto)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA rol para estetica web -->
                @foreach($roles as $rol)
                    @if($eleccioncomite->rol_id === $rol->id)
                        @php($namerol = $rol->descripcion)
                        @break;
                    @endif
                @endforeach
            

            <tr>
                <td>{{$eleccioncomite->id}}</td>
                <td>{{$periodo}}</td>
                <td>{{$name}}</td>
                <td>{{$namerol}}</td>
                <td><a href="{{ route('eleccioncomite.edit', $eleccioncomite->id)}}"
                class="btn btn-primary"><i class="fas fa-pen"></i></a></td>
                <td>
                    <form action="{{ route('eleccioncomite.destroy', $eleccioncomite->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$eleccioncomite->id}}')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection