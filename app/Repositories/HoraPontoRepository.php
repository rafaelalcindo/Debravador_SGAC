<?php

namespace App\Repositories;

use App\Evento;
use App\Usuario;
use App\HoraPonto;
use App\Classes\FormataData;
use App\Repositories\PontoIndividualRepository;

use Illuminate\Support\Facades\DB;

class HoraPontoRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new HoraPonto();
        $this->pontoIndividualRepository = new PontoIndividualRepository();
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
}
