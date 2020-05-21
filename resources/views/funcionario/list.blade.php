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
            <h1 class="animated rubberBand">Funcionarios</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('funcionario.create')}}"
                    class="btn btn-dark btn-block btn-sm mt-3 animated rubberBand">Nuevo funcionario</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table table-striped table-dark animated fadeInUp">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre completo</th>
            <th scope="col">Sexo (M o F):</th>
            <th colspan="2">Controles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
            <tr>
                <td>{{$funcionario->id}}</td>
                <td>{{$funcionario->nombrecompleto}}</td>
                <td>{{$funcionario->sexo}}</td>
                <td><a href="{{ route('funcionario.edit', $funcionario->id)}}"
                class="btn btn-primary"><i class="fas fa-pen"></i></a></td>
                <td>
                    <form action="{{ route('funcionario.destroy', $funcionario->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$funcionario->nombrecompleto}}')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection