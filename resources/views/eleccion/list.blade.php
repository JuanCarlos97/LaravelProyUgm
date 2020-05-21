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
            <h1 class="animated rubberBand">Elecciones</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('eleccion.create')}}"
                    class="btn btn-dark btn-block btn-sm mt-3 animated rubberBand">Nueva elección</a></td>
        </div>
        <hr>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-dark animated fadeInUp">
        <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Periodo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Fecha de apertura</th>
                <th scope="col">Hora de apertura</th>
                <th scope="col">Fecha de cierre</th>
                <th scope="col">Hora de cierra</th>
                <th scope="col">Observaciones</th>
                <th colspan="2">Controles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($elecciones as $eleccion)
                <tr>
                    <td>{{$eleccion->id}}</td>
                    <td>{{$eleccion->periodo}}</td>
                    <td>{{$eleccion->fecha}}</td>
                    <td>{{$eleccion->fechaapertura}}</td>
                    <td>{{$eleccion->horaapertura}}</td>
                    <td>{{$eleccion->fechacierre}}</td>
                    <td>{{$eleccion->horacierre}}</td>
                    <td>{{$eleccion->observaciones}}</td>
                    <td><a href="{{ route('eleccion.edit', $eleccion->id)}}"
                    class="btn btn-primary"><i class="fas fa-pen"></i></a></td>
                    <td>
                        <form action="{{ route('eleccion.destroy', $eleccion->id)}}"
                        method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                            onclick="return confirm('Esta seguro de borrar {{$eleccion->periodo}}')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<div>
@endsection