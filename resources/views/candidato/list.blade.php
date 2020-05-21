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
            <h1 class="animated rubberBand">Candidatos</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('candidato.create')}}"
                    class="btn btn-dark btn-block btn-sm mt-3 animated rubberBand">Nuevo candidato</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table table-striped table-dark animated fadeInUp">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre completo</th>
            <th scope="col">Sexo</th>
            <th scope="col">Foto</th>
            <th scope="col">Perfil</th>
            <th colspan="2">Controles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($candidatos as $candidato)
            <tr>
                <td>{{$candidato->id}}</td>
                <td>{{$candidato->nombrecompleto}}</td>
                <td>{{$candidato->sexo}}</td>
                <td>{{$candidato->foto}}</td>
                <td>{{$candidato->perfil}}</td>
                <td><a href="{{ route('candidato.edit', $candidato->id)}}"
                class="btn btn-primary"><i class="fas fa-pen"></i></a></td>
                <td>
                    <form action="{{ route('candidato.destroy', $candidato->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$candidato->nombrecompleto}}')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection