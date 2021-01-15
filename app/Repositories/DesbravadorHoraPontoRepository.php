<?php

namespace App\Repositories;

use App\Evento;
use App\Usuario;
use App\HoraPonto;
use App\DesbravadorHoraPonto;
use App\Classes\FormataData;
use App\Repositories\PontoIndividualRepository;
use DateTime;
use Illuminate\Support\Facades\DB;

class DesbravadorHoraPontoRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new DesbravadorHoraPonto();
    }

    public function adicionarDesbravadorHoraPonto($usuario_id, $hora_ponto_id, $dataTime)
    {
        $data = [
            'usuario_id' => $usuario_id,
            'hora_ponto_id' => $hora_ponto_id,
            'data_chegada' => $dataTime->format('Y-m-d'),
            'hora_chegada' => $dataTime->format('H:i')
        ];

        return DesbravadorHoraPonto::create($data);
    }
}
