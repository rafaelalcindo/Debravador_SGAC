<?php

namespace App\Repositories;

use App\Usuario;
use App\Unidade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Usuario();
    }

    public function pegarUsuarioDetalhes($usuario_api)
    {
        $usuario = Usuario::find($usuario_api);
        $usuario->pontos = $usuario->pontosAcumulado();
        if (isset($usuario->unidade)) {
            $usuario->pontos_unidade = $usuario->unidade->pontosAcumulado();
        }

        return $usuario;
    }
}
