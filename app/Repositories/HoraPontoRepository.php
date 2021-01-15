<?php

namespace App\Repositories;

use App\Evento;
use App\Usuario;
use App\HoraPonto;
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
        $this->pontoIndividualRepository = new PontoIndividualRepository();
        $this->desbravadorHoraPontoRepository = new DesbravadorHoraPontoRepository();
    }

    public function criarHoraPonto($request)
    {
        $data_formatada =  new FormataData($request['data_programacao']);
        $request['data_programacao'] = $data_formatada->pegarNovaData();

        $horaPonto = HoraPonto::create($request->all())->id ?? null;

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
        $usuario = Usuario::find($usuario_id);

        $startDate = new DateTime($this->formataData($horaPonto->data_programacao) . ' ' . $horaPonto->hora_programacao);
        $endDate = new DateTime();

        if ($startDate->format('Y-m-d') == $endDate->format('Y-m-d')) {
            $interval = $startDate->diff($endDate);
            $hours = $interval->format('%h');
            $minutes = $interval->format('%i');

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

    private function formataData($data)
    {
        $data = str_replace('/', '', $data);
        $dia = substr($data, 0, 2);
        $mes = substr($data, 2, 2);
        $ano = substr($data, 4, 4);
        $data = $ano . '-' . $mes . '-' . $dia;
        return $data;
    }
}
