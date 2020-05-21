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
            <h1 class="animated rubberBand">Casillas</h1>
        </div>
        <div class="col">
            <a href="{{ route('casilla.create')}}"
                    class="btn btn-dark btn-sm mt-3 btn-block animated rubberBand">Nueva casilla</a></td>
        </div>
        <hr>
    </div>
    <table class="table table-striped table-dark animated fadeInUp">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">UBICACIÓN</th>
            <th scope="col">Controles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($casillas as $casilla)
            <tr>
                <td>{{$casilla->id}}</td>
                <td>{{$casilla->ubicacion}}</td>
                <td><a href="{{ route('casilla.edit', $casilla->id)}}"
                class="btn btn-primary">

                <i class="fas fa-pen"></i>


                </a></td>
                <td>
                    <form action="{{ route('casilla.destroy', $casilla->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$casilla->ubicacion}}')">

                        
                        <i class="fas fa-trash-alt"></i>
                        
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection
