<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Evento;
use App\Classes\FormataData;
use Carbon\Carbon;
use App\Repositories\EventosRepository;

class EventosApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->repository = new EventosRepository();
    }

    public function index(Request $request)
    {
        $ano = $request->query('ano');
        $eventos = $this->repository->pegarEventoAno($ano);

        return response()->json($eventos);
    }

    public function addDebravadorEvento(Request $request)
    {
        $id_debravador = $request['desbravador_id'];
        $evento_id = $request['evento_id'];

        $usuario = Usuario::find($id_debravador);

        $usuario->eventos()->attach($evento_id);

        return response()->json(['sucesso' => 'desbravador adicionado no evento com sucesso']);
    }

    public function getDesbravadoresEvento($id)
    {
        $evento = $this->repository->pegarDesbravadorDentroEvento($id);

        return response()->json($evento);
    }

    public function adicionarDesbravadorEventoPonto(Request $request)
    {
        $resu = $this->repository->addDesbravaPontos($request);
        if ($resu) {
            return response()->json(['sucesso' => 'ponto adicionado com sucesso!']);
        }
        return response()->json(['erro' => 'tivemos um erro em adicionar a pontuação']);
    }
}
