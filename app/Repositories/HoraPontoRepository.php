<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Usuario;
use App\HoraPonto;
use App\DesbravadorHoraPonto;
use App\Classes\FormataData;
use App\Repositories\PontoIndividualRepository;
use App\Repositories\DesbravadorHoraPontoRepository;
use DateTime;
use Illuminate\Support\Facades\DB;

class HoraPontoRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new HoraPonto();
        $this->model_hora_ponto = new DesbravadorHoraPonto();
        $this->pontoIndividualRepository = new PontoIndividualRepository();
        $this->desbravadorHoraPontoRepository = new DesbravadorHoraPontoRepository();
    }

    public function carregarLista(Request $request)
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

        return $horaPontos->get();
    }

    public function criarHoraPonto($request)
    {
        $data_formatada =  new FormataData($request['data_programacao']);
        $request['data_programacao'] = $data_formatada->pegarNovaData();

        $horaPonto = HoraPonto::create($request->all()) ?? null;

        return $horaPonto;
    }

    public function atualizarHoraPonto($request, $id)
    {
        $data_formatada =  new FormataData($request['data_programacao']);
        $request['data_programacao'] = $data_formatada->pegarNovaData();

        $horaPonto = HoraPonto::find($id);
        $resu = $horaPonto->update($request->all());

        return $resu;
    }

    public function pegarDesbravadorForaHora($id_hora)
    {
        $lista_ids = [];
        $desbra_horas = DB::table('desbravador_hora_pontos')
            ->where('hora_ponto_id', '=', $id_hora)
            ->get();

        foreach ($desbra_horas as $idx => $pivot) {
            $lista_ids[] = $pivot->usuario_id;
        }

        return DB::table('usuarios')
            ->whereNotIn('id', $lista_ids)
            ->get();
    }

    public function diferencaDeData($request)
    {
        $query = $request->query();
        $hora_ponto_id = $query['hora_ponto_id'];
        $usuario_id = $query['usuario_id'];

        $horaPonto = HoraPonto::find($hora_ponto_id);

        $startDate = new DateTime($this->formataData($horaPonto->data_programacao) . ' ' . $horaPonto->hora_programacao);
        $endDate = new DateTime();

        if ($startDate->format('Y-m-d') == $endDate->format('Y-m-d')) {
            $interval = $endDate->diff($startDate);

            $hours = $interval->format('%h');
            $minutes = $interval->format('%r%i');

            $total = ($hours * 60 + $minutes);

            if ($total < 10) {
                $pontos = $horaPonto->pontos;
            } else if ($total <= 40) {
                $pontos = $horaPonto->pontos / 2;
            } else {
                $pontos = $horaPonto->pontos / 3;
            }

            $this->desbravadorHoraPontoRepository->adicionarDesbravadorHoraPonto($usuario_id, $hora_ponto_id, $endDate);
            $this->pontoIndividualRepository->adicionarPontoUsuario($usuario_id, 'Ponto de Chegada', $pontos);
            return true;
        }

        return false;
    }

    public function pegarDesbravadorForaHoraMarcado($id_hora)
    {
        $horas_marcadas = $this->model_hora_ponto
            ->where('hora_ponto_id', '=', $id_hora)
            ->get();

        return $horas_marcadas;
    }

    private function formataData($data)
    {
        $data = str_replace('/', '', $data);
        $dia = substr($data, 0, 2);
        $mes = substr($data, 2, 2);
        $ano = substr($data, 4, 4);
        $data = $ano . '-' . $mes . '-' . $dia;
        return $data;
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
