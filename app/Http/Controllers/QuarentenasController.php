<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Unidade;
use App\Usuario;
use App\DesbravadorResponsavel;
use App\PontoIndividual;
use App\Classes\FormataData;
use App\Quarentena;
use App\Repositories\QuarentenaRepository;
use App\Repositories\UsuarioRepository;

class QuarentenasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->repository = new QuarentenaRepository();
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function index(Request $request)
    {
        $quarentenas = $this->repository->filtroIndex($request);
        $filtro = $request->query();

        return view('quarentenas.index', compact('quarentenas', 'filtro'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('quarentenas.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data_formatada = new FormataData($request['data_pontos']);
        $request['data_pontos'] = $data_formatada->pegarNovaData();
        $request['desbravador'] = $this->usuarioRepository->verificarSeDesbravador($request['usuario_id']);

        Quarentena::create($request->all());
        return redirect('/quarentenas')->with('success', 'Ponto de Quarentena adicionado com sucesso!');
    }

    public function edit($id)
    {
        $quarentena = Quarentena::find($id);
        $usuarios = Usuario::all();
        return view('quarentenas.edit', compact('quarentena', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $quarentena = Quarentena::find($id);
        $data_formatada = new FormataData($request['data_pontos']);
        $request['data_pontos'] = $data_formatada->pegarNovaData();
        $request['desbravador'] = $this->usuarioRepository->verificarSeDesbravador($request['usuario_id']);

        $quarentena->update($request->all());
        return redirect('/quarentenas')->with('success', 'Ponto de Quarentena editado com sucesso!');
    }

    public function destroy($id)
    {
        $quarentena = Quarentena::whereId($id)->delete();
        return redirect('/quarentenas')->with('success', 'Ponto de Quarentena deletado com sucesso!');
    }

    public function show($id)
    {
        $quarentena = Quarentena::find($id);
        return view('quarentenas.show', compact('quarentena'));
    }
}
