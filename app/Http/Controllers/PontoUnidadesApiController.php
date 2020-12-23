<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;
use App\PontoUnidade;
use App\Classes\FormataData;
use App\Repositories\PontoUnidadesRepository;

class PontoUnidadesApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->repository = new PontoUnidadesRepository();
    }

    public function index(Request $request)
    {
        $pontoUnidades = $this->repository->filtroIndex($request);

        return response()->json($pontoUnidades);
    }

    // public function create()
    // {
    //     $unidades = Unidade::all();
    //     return view('ponto_unidades.create', compact('unidades'));
    // }

    public function store(Request $request)
    {
        $formataData = new FormataData($request['data_pontos']);
        $request['data_pontos'] = $formataData->pegarNovaData();
        PontoUnidade::create($request->all());
        return response()->json(['message' => 'ponto cadastrado com sucesso!']);
    }

    public function update(Request $request, $id)
    {
        $pontoUnidade = PontoUnidade::find($id);

        $formataData = new FormataData($request['data_pontos']);
        $request['data_pontos'] = $formataData->pegarNovaData();

        $pontoUnidade->update($request->all());
        return response()->json($pontoUnidade);
    }

    public function destroy($id)
    {
        $pontoUnidade = PontoUnidade::whereId($id)->delete();
        return response()->json(['message' => 'ponto deletado com sucesso!']);
    }

    public function show($id)
    {
        $pontoUnidade = PontoUnidade::find($id);

        return response()->json($pontoUnidade);
    }

    public function getUserUnitPoints($id_usuario)
    {
        $pontosUnidade = $this->repository->pegarPontosUsuarioUnidade($id_usuario);

        return response()->json($pontosUnidade);
    }
}
