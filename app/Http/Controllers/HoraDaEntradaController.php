<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HoraPontoRepository;
use App\Classes\FormataData;
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
    public function index(Request $request)
    {
        $horaPontos = HoraPonto::orderBy('created_at', 'desc');
        $filtro = $request->query();

        if (isset($filtro['search_descricao'])) {
            $horaPontos = $horaPontos
                ->orWhere('descricao', 'like', '%' . $filtro['search_descricao'] . '%');
        }

        if (isset($filtro['search_data']) && !empty($filtro['search_data'])) {
            $dataResu = $this->_ajusteFiltroData($filtro['search_data']);

            $data_inicio = new FormataData($dataResu['inicio']);
            $data_final = new FormataData($dataResu['final']);

            $horaPontos = $horaPontos
                ->where('data_programacao', '>=', $data_inicio->pegarNovaData())
                ->where('data_programacao', '<=', $data_final->pegarNovaData());
        }

        $horaPontos = $horaPontos->paginate(20);
        return view('hora_da_entrada.index', compact('horaPontos', 'filtro'));
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

    private function _ajusteFiltroData($dataGeral)
    {
        $dataMandar = [];
        $data = explode(" - ", $dataGeral);
        $dataMandar['inicio'] = $data[0];
        $dataMandar['final'] = $data[1];
        return $dataMandar;
    }
}
