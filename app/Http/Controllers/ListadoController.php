<?php
namespace App\Http\Controllers;
use App\Models\Casilla;
use App\Models\Candidato;
use App\Models\Funcionario;
use App\Models\Eleccion;
use App\Models\Rol;
use App\Models\Eleccioncomite;
use App\Models\Voto;
use App\Models\Funcionariocasilla;
use App\Models\Imeiautorizado;
use App\Models\Votocandidato;
use Barryvdh\DomPDF\Facade as PDF; //--- Se agregó esta línea

use Illuminate\Http\Request;

class ListadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casillas = Casilla::all();
        $candidatos = Candidato::all();
        $funcionarios = Funcionario::all();
        $elecciones = Eleccion::all();
        $roles = Rol::all();
        $eleccionescomite = Eleccioncomite::all();
        $votos = Voto::all();
        $funcionarioscasilla = Funcionariocasilla::all();
        $imeisautorizados = Imeiautorizado::all();
        $votoscandidato = Votocandidato::all();
        return view('listado/list',
            compact(
                'casillas',
                'candidatos',
                'funcionarios',
                'elecciones',
                'roles',
                'eleccionescomite',
                'votos',
                'funcionarioscasilla',
                'imeisautorizados',
                'votoscandidato'
            ));
    }

    public function generatepdf() {
        $casillas = Casilla::all();
        $candidatos = Candidato::all();
        $funcionarios = Funcionario::all();
        $elecciones = Eleccion::all();
        $roles = Rol::all();
        $eleccionescomite = Eleccioncomite::all();
        $votos = Voto::all();
        $funcionarioscasilla = Funcionariocasilla::all();
        $imeisautorizados = Imeiautorizado::all();
        $votoscandidato = Votocandidato::all();

        $html = view('listado/pdf', compact(
                'casillas',
                'candidatos',
                'funcionarios',
                'elecciones',
                'roles',
                'eleccionescomite',
                'votos',
                'funcionarioscasilla',
                'imeisautorizados',
                'votoscandidato'
            ));
        $pdf = PDF::loadHTML($html);
    
        // Descargamos el archivo
        return $pdf->download('Elecciones.pdf');
    }
}
