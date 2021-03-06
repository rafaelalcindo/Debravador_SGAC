<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;
use App\PontoUnidade;
use App\Classes\FormataData;
use App\Repositories\PontoUnidadesRepository;

class PontoUnidadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->repository = new PontoUnidadesRepository();
    }

    public function index(Request $request)
    {
        $pontoUnidades = $this->repository->filtroIndex($request);
        $filtro = $request->query();

        $unidades = Unidade::all();

        return view('ponto_unidades.index', compact('pontoUnidades', 'filtro', 'unidades'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        return view('ponto_unidades.create', compact('unidades'));
    }

    public function store(Request $request)
    {
        $formataData = new FormataData($request['data_pontos']);
        $request['data_pontos'] = $formataData->pegarNovaData();
        PontoUnidade::create($request->all());
        return redirect('/ponto-unidades')->with('success', 'Pontos da Unidade cadastrado com Sucesso!');
    }

    public function edit($id)
    {
        $pontoUnidade = PontoUnidade::find($id);
        $unidades     = Unidade::all();
        return view('ponto_unidades.edit', compact('pontoUnidade', 'unidades'));
    }

    public function update(Request $request, $id)
    {
        $pontoUnidade = PontoUnidade::find($id);

        $formataData = new FormataData($request['data_pontos']);
        $request['data_pontos'] = $formataData->pegarNovaData();

        $pontoUnidade->update($request->all());
        return redirect('/ponto-unidades')->with('success', 'Pontos da Unidade Editado com Sucesso!');
    }

    public function destroy($id)
    {
        $pontoUnidade = PontoUnidade::whereId($id)->delete();
        return redirect('/ponto-unidades')->with('success', 'Pontos da Unidade Deletado com Sucesso!');
    }

    public function show($id)
    {
        $pontoUnidade = PontoUnidade::find($id);
        return view('ponto_unidades.show', compact('pontoUnidade'));
    }
}
