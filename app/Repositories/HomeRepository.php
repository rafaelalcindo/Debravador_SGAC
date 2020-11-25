<?php
namespace App\Repositories;

use App\Usuario;
use App\Unidade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Usuario();
    }

    public function pegarListaDesbravadores()
    {
        $debravadores = Usuario::get()->sortByDesc(function($query){
            if (isset($query->unidade)) {
                return $query->pontosAcumulado();
            }
        });

        return $debravadores;
    }

    public function pegarListaUnidades()
    {
        $unidades = Unidade::get()->sortByDesc(function($query){
            return $query->pontosAcumulado();
        });

        return $unidades;
    }

}

