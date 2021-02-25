<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HoraPontoRepository;
use App\Classes\FormataData;
use App\HoraPonto;

class HoraDaEntradaApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->repository = new HoraPontoRepository();
    }

    public function store(Request $request)
    {
        $horaPonto = $this->repository->criarHoraPonto($request);
        return response()->json($horaPonto);
    }

    public function carregarLista(Request $request)
    {
        $hora_pontos = $this->repository->carregarLista($request);
        return response()->json($hora_pontos);
    }

    public function selecionaUsuario($id)
    {
        $horaPontos = HoraPonto::find($id);
        // $usuarios = $this->repository->pegarDesbravadorForaHora($id);
        return response()->json($horaPontos->usuarios);
    }

    public function selecionaUsuarioNaoMarcado($id)
    {
        $usuarios = $this->repository->pegarDesbravadorForaHora($id);
        return response()->json($usuarios);
    }

    public function adicionarUsuarioHorario(Request $request)
    {
        $resu = $this->repository->diferencaDeData($request);
        return response()->json(['resultado' => $resu]);
    }
}
