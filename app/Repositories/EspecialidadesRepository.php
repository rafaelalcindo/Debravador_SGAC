<?php

namespace App\Repositories;

use App\Especialidade;

class EspecialidadesRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Especialidade();
    }

    public function pegarEspecialidadeUsuario($id_usuario)
    {
        return $this->model
            ->where('usuario_id', '=', $id_usuario)
            ->get();
    }
}
