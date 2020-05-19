@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>
<div class="card uper">
    <div class="card-header">
        Agregar Votos
    </div>
    <div class="card-body">
        
        <form method="post" action="{{ route('votocandidato.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                @csrf
                <label for="candidato_id">Elige al candidato:</label>
                <select id="candidato_id" class="form-group" name="candidato_id" >
                    <optgroup label="Candidatos">
                    @foreach($candidatos as $candidato)
                        <option for="candidato_id" class="form-group" label="{{$candidato->nombrecompleto}}" name="candidato_id">{{$candidato->id}}</option>
                    @endforeach
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                @csrf
                <label for="voto_id">Elige la procedencia:</label>
                <select id="voto_id" class="form-group" name="voto_id" >
                    <optgroup label="Evidencia">
                    @foreach($votos as $voto)
                        <option for="voto_id" class="form-group" label="{{$voto->evidencia}}" name="voto_id">{{$voto->id}}</option>
                    @endforeach
                    </optgroup>
                </select>
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="votos">Ingresa la cantidad de votos:</label>
                <input type="number" class="form-control" name="votos" />
            </div>

            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
@endsection
