<?php

namespace App\Repositories;

use App\Evento;

class EventosRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Evento();
    }

    public function pegarEventoAno($ano)
    {
        return $this->model
            ->whereYear('data_evento', '=', $ano)
            ->get();
    }

    public function pegarDesbravadorDentroEvento($id_evento)
    {
        return $this->model
            ->where('id', '=', $id_evento)
            ->with('usuarios')
            ->get();
    }
}
