<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Unidade;
use App\PontoUnidade;
use App\Repositories\UnidadesRepository;

class UnidadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth:api');
        $this->repository = new UnidadesRepository();
    }

    public function index(Request $request)
    {
        $unidades = $this->repository->filtroIndex($request);
        $filtro = $request->query();
        return view('unidades.index', compact('unidades', 'filtro'));
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|max:100',
                'equipamentos' => 'required',
            ]
        );

        Unidade::create($request->all());
        return redirect('/unidades')->with('success', 'Unidade Cadastrado com Sucesso!');;
    }

    public function edit($id)
    {
        $unidade = Unidade::find($id);
        //dd($unidade);
        return view('unidades.edit', compact('unidade'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nome' => 'required|max:100',
                'equipamentos' => 'required',
            ]
        );

        $unidade = Unidade::find($id);
        $unidade->update($request->all());
        return redirect('unidades')->with('success', 'Unidade Atualizado com Sucesso!');;
    }

    public function destroy($id)
    {
        $unidade = Unidade::whereId($id)->delete();
        return redirect('/unidades')->with('success', 'Unidade Deletado com Sucesso!');;
    }

    public function show($id)
    {
        $unidade = Unidade::find($id);

        return view('unidades.show', compact('unidade'));
    }

    /**
     * Parte da API
     */

    public function pegarUnidades(Request $request)
    {
        $unidades = $this->repository->filtroIndex($request);
        return response()->json($unidades);
    }
}
