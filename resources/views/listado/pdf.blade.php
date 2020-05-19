<html>

<head>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    @page {
        margin: 0cm 0cm;
        font-family: Arial;
    }

    .page-break {
        page-break-after: always;
    }

    body {
        margin: 3cm 2cm 2cm;
    }

    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color: #2a0927;
        color: white;
        text-align: center;
        line-height: 30px;
    }

    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color: #2a0927;
        color: white;
        text-align: center;
        line-height: 35px;
    }

    /* Primera grafica */

    .grafico {
        position: absolute;
        width: 1cm;
        padding: 2px;
        margin-left: 5cm;
    }

    .grafico .barra {
        display: block;
        position: relative;
        background: #B1D632;
        text-align: center;
        color: #333;
        width: 1cm;
        line-height: 2em;
        font-size: 9px;
        border: 1px solid #000;
        margin-top: 2cm;
    }

    .grafico .barra span {
        position: absolute;
        left: 1em;
    }

    .candidato-text {
        font-size: 8px;
        text-align: center;
    }

    /* Segunda grafica */

    .graficoA {
        position: relative; /* IE is dumb */
        width: 200px;
        padding: 2px;
    }
    .graficoA .barra {
        display: block;
        position: relative;
        background: #FF5733;
        text-align: center;
        color: #333;
        height: 1em;
        line-height: 2em;
    }
    .graficoA .barra span {
        position: absolute; left: 1em;
    }

    /* Tercera grafica */

    .graficoB {
        position: relative; /* IE is dumb */
        width: 600px;
        padding: 2px;
    }
    .graficoB .barra {
        display: block;
        position: relative;
        background: #6700AE;
        color: #fff;
        height: 2em;
        line-height: 2em;
        font-size: 9px;
    }
    .graficoB .barra span {
        position: absolute; left: 1em;
    }
    </style>
</head>

<body>
    <header>
        <h1>Daisy Diaz Zamora</h1>
    </header>

    <main>
        <h2>Grafica</h2>

        <!-- RECORRIDO DE TABLA  -->
        @foreach($votoscandidato as $votocandidato)

            <!-- RECORRIDO DE TABLA  -->
            @foreach($candidatos as $candidato)
                @if($votocandidato->candidato_id === $candidato->id)
                    @php ($cand = $candidato->nombrecompleto)
                    @break;
                @endif
            @endforeach

            <div class="grafico">
                <strong class="barra"
                    style="height: <?php echo $votocandidato->votos; ?>;">
                            {{$votocandidato->votos}}
                </strong><span class="candidato-text">{{$cand}}</span></div>
        ------
        
        @endforeach
        <div class="page-break"></div>
        <h2>Grafica 2</h2>

        <!-- RECORRIDO DE TABLA  -->
        @foreach($votoscandidato as $votocandidato)

            <!-- RECORRIDO DE TABLA  -->
            @foreach($candidatos as $candidato)
                @if($votocandidato->candidato_id === $candidato->id)
                    @php ($cand = $candidato->nombrecompleto)
                    @break;
                @endif
            @endforeach

            <div class="graficoA"><strong class="barra" style="width: <?php echo $votocandidato->votos; ?>;">
                </strong><span class="candidato-text">{{$cand}} tiene: {{$votocandidato->votos}} votos</span>
            </div>
        
        @endforeach

        <div class="page-break"></div>

        <h2>Grafica 3</h2>

        <!-- RECORRIDO DE TABLA  -->
        @foreach($votoscandidato as $votocandidato)

            <!-- RECORRIDO DE TABLA  -->
            @foreach($candidatos as $candidato)
                @if($votocandidato->candidato_id === $candidato->id)
                    @php ($cand = $candidato->nombrecompleto)
                    @break;
                @endif
            @endforeach

            <div class="graficoB"><strong class="barra" style="width: <?php echo $votocandidato->votos; ?>;">
            {{$cand}} | {{$votocandidato->votos}} votos
                </strong>
            </div>
        
        @endforeach

        <div class="page-break"></div>
        <h2>Casillas</h2>
        <table class="table table-dark animated fadeInUp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">UBICACIÓN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($casillas as $casilla)
                <tr>
                    <td>{{$casilla->id}}</td>
                    <td>{{$casilla->ubicacion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>
        <h2>Candidatos</h2>
        <table class="table table-dark animated fadeInUp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Perfil</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>
        <h2>Funcionarios</h2>
        <table class="table table-dark animated fadeInUp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Sexo (M o F):</th>
                </tr>
            </thead>
            <tbody>
                @foreach($funcionarios as $funcionario)
                <tr>
                    <td>{{$funcionario->id}}</td>
                    <td>{{$funcionario->nombrecompleto}}</td>
                    <td>{{$funcionario->sexo}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>
        <h2>Elección</h2>
        <div class="table-responsive">
            <table class="table table-dark animated fadeInUp">
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="page-break"></div>
        <h2>Rol</h2>
        <table class="table table-dark animated fadeInUp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DESCRIPCIÓN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $rol)
                <tr>
                    <td>{{$rol->id}}</td>
                    <td>{{$rol->descripcion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>
        <h2>Elección de comite</h2>
        <table class="table table-dark animated fadeInUp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ELECCION</th>
                    <th scope="col">FUNCIONARIO</th>
                    <th scope="col">ROL</th>
                </tr>
            </thead>
            <tbody>

                <!-- RECORRIDO DE TABLA eleccioncomite -->
                @foreach($eleccionescomite as $eleccioncomite)

                <!-- RECORRIDO DE TABLA eleccion para estetica web -->
                @foreach($elecciones as $eleccion)
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
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>
        <h2>Votos</h2>
        <table class="table table-dark animated fadeInUp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ELECCION</th>
                    <th scope="col">CASILLA</th>
                    <th scope="col">EVIDENCIA</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>
        <h2>Funcionario casilla</h2>
        <table class="table table-dark animated fadeInUp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FUNCIONARIO</th>
                    <th scope="col">CASILLA</th>
                    <th scope="col">ROL</th>
                    <th scope="col">ELECCIÓN</th>
                </tr>
            </thead>
            <tbody>

                <!-- RECORRIDO DE TABLA funcionariocasilla -->
                @foreach($funcionarioscasilla as $funcionariocasilla)
                <!-- RECORRIDO DE TABLA funcionario para estetica web -->
                @foreach($funcionarios as $funcionario)
                @if($funcionariocasilla->funcionario_id === $funcionario->id)
                @php ($nombre = $funcionario->nombrecompleto)
                @break;
                @endif
                @endforeach

                <!-- RECORRIDO DE TABLA casilla para estetica web -->
                @foreach($casillas as $casilla)
                @if($funcionariocasilla->casilla_id === $casilla->id)
                @php($lacasilla = $casilla->ubicacion)
                @break;
                @endif
                @endforeach

                <!-- RECORRIDO DE TABLA rol para estetica web -->
                @foreach($roles as $rol)
                @if($funcionariocasilla->rol_id === $rol->id)
                @php($elrol = $rol->descripcion)
                @break;
                @endif
                @endforeach

                <!-- RECORRIDO DE TABLA eleccion para estetica web -->
                @foreach($elecciones as $eleccion)
                @if($funcionariocasilla->eleccion_id === $eleccion->id)
                @php($laeleccion = $eleccion->periodo)
                @break;
                @endif
                @endforeach


                <tr>
                    <td>{{$funcionariocasilla->id}}</td>
                    <td>{{$nombre}}</td>
                    <td>{{$lacasilla}}</td>
                    <td>{{$elrol}}</td>
                    <td>{{$laeleccion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>
        <h2>Imei autorizados</h2>
        <table class="table table-dark animated fadeInUp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FUNCIONARIO</th>
                    <th scope="col">ELECCIÓN</th>
                    <th scope="col">CASILLA</th>
                    <th scope="col">IMEI</th>
                </tr>
            </thead>
            <tbody>

                <!-- RECORRIDO DE TABLA imeiautorizado -->
                @foreach($imeisautorizados as $imeiautorizado)
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
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>
        <h2>Votos a los candidatos</h2>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CANDIDATO</th>
                    <th scope="col">CANTIDAD DE VOTOS</th>
                </tr>
            </thead>
            <tbody>

                <!-- RECORRIDO DE TABLA  -->
                @foreach($votoscandidato as $votocandidato)
                <!-- RECORRIDO DE TABLA  -->
                @foreach($candidatos as $candidato)
                @if($votocandidato->candidato_id === $candidato->id)
                @php ($cand = $candidato->nombrecompleto)
                @break;
                @endif
                @endforeach


                <tr>
                    <td>{{$votocandidato->voto_id}}</td>
                    <td>{{$cand}}</td>
                    <td>{{$votocandidato->votos}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </main>

    <footer>
        <h1>www.daysi.net</h1>
    </footer>
</body>

</html>