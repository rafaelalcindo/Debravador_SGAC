<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;
use App\PontoIndividual;
use App\Classes\FormataData;
use App\Repositories\PontoIndividualRepository;

class PontoIndividuaisApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->repository = new PontoIndividualRepository();
    }

    public function index(Request $request)
    {
        $pontoIndividuals = $this->repository->filtroIndex($request);

        return response()->json($pontoIndividuals);
    }

    // public function create()
    // {
    //     $usuarios = Usuario::all();
    //     return view('ponto_individuals.create', compact('usuarios'));
    // }

    public function store(Request $request)
    {
        $data_formatada = new FormataData($request['data_pontos']);
        $request['data_pontos'] = $data_formatada->pegarNovaData();
        PontoIndividual::create($request->all());
        return response()->json(['message' => 'ponto criado com sucesso!']);
    }

    // public function edit($id)
    // {
    //     $pontoIndividual = PontoIndividual::find($id);
    //     $usuarios = Usuario::all();
    //     return view('ponto_individuals.edit', compact('pontoIndividual', 'usuarios'));
    // }

    public function update(Request $request, $id)
    {
        $pontoIndividual = PontoIndividual::find($id);
        $data_formatada = new FormataData($request['data_pontos']);
        $request['data_pontos'] = $data_formatada->pegarNovaData();
        $pontoIndividual->update($request->all());
        return response()->json($pontoIndividual);
    }

    public function destroy($id)
    {
        $pontoIndividual = PontoIndividual::whereId($id)->delete();
        return response()->json(['message' => 'ponto removido com sucesso']);
    }

    public function show($id)
    {
        $pontoIndividual = PontoIndividual::find($id)
            ->with(['usuario'])->get();
        return response()->json($pontoIndividual);
    }
}
