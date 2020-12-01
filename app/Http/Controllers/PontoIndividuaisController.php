<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Unidade;
use App\Usuario;
use App\DesbravadorResponsavel;
use App\PontoIndividual;
use App\Classes\FormataData;
use App\Repositories\PontoIndividualRepository;

class PontoIndividuaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->repository = new PontoIndividualRepository();
    }

    public function index(Request $request)
    {
        $pontoIndividuals = $this->repository->filtroIndex($request);
        $filtro = $request->query();

        return view('ponto_individuals.index', compact('pontoIndividuals', 'filtro'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('ponto_individuals.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data_formatada = new FormataData($request['data_pontos']);
        $request['data_pontos'] = $data_formatada->pegarNovaData();
        PontoIndividual::create($request->all());
        return redirect('/ponto_individuals')->with('success', 'Pontos do Desbravador cadastrado com Sucesso!');
    }

    public function edit($id)
    {
        $pontoIndividual = PontoIndividual::find($id);
        $usuarios = Usuario::all();
        return view('ponto_individuals.edit', compact('pontoIndividual', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $pontoIndividual = PontoIndividual::find($id);
        $data_formatada = new FormataData($request['data_pontos']);
        $request['data_pontos'] = $data_formatada->pegarNovaData();
        $pontoIndividual->update($request->all());
        return redirect('/ponto_individuals')->with('success', 'Pontos do Desbravador atualizado com Sucesso!');
    }

    public function destroy($id)
    {
        $pontoIndividual = PontoIndividual::whereId($id)->delete();
        return redirect('/ponto_individuals')->with('success', 'Pontos do Desbravador Deletado com Sucesso!');
    }

    public function show($id)
    {
        $pontoIndividual = PontoIndividual::find($id);
        return view('ponto_individuals.show', compact('pontoIndividual'));
    }
}
