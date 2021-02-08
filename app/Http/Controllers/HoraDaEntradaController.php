<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HoraPontoRepository;
use App\HoraPonto;

class HoraDaEntradaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->repository = new HoraPontoRepository();
    }

    /**
     * Mark the time the pathfinder get into the club.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $horaPontos = HoraPonto::orderBy('created_at', 'desc')->paginate(20);

        return view('hora_da_entrada.index', compact('horaPontos'));
    }

    public function create()
    {
        return view('hora_da_entrada.create');
    }

    public function store(Request $request)
    {
        $horaPonto = $this->repository->criarHoraPonto($request);

        return redirect('/hora_da_entrada')->with('success', 'Data e hora cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $horaPontos = HoraPonto::find($id);

        return view('hora_da_entrada.edit', compact('horaPontos'));
    }

    public function update(Request $request, $id)
    {
        $horaPontos = $this->repository->atualizarHoraPonto($request, $id);

        return redirect('/hora_da_entrada')->with('success', 'Data e Hora atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $horaPonto = HoraPonto::whereId($id)->delete();
        return redirect('/hora_da_entrada')->with('success', 'Pontos do Desbravador Deletado com Sucesso!');
    }

    public function selecionaUsuario($id)
    {
        $horaPontos = HoraPonto::find($id);
        $usuarios = $this->repository->pegarDesbravadorForaHora($id);
        return view('hora_da_entrada.layout_modal.seleciona_usuario', compact('horaPontos', 'usuarios'));
    }

    public function adicionarUsuarioHorario(Request $request)
    {
        $resu = $this->repository->diferencaDeData($request);
        return response()->json(['resultado' => $resu]);
    }
}
