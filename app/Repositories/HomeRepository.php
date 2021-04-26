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
        $debravadores = Usuario::get()->where('nivel', 'Desbravadores')->sortByDesc(function ($query) {
            if (isset($query->unidade)) {
                return $query->pontosAcumulado();
            }
        });

        return $debravadores;
    }

    public function pegarListaDiretorias()
    {
        $diretorias = Usuario::get()
            ->whereIn('nivel', ['Conselheiros', 'Secretaria', 'Administrativo'])
            ->sortByDesc(function ($query) {
                if (isset($query->unidade)) {
                    return $query->pontosAcumulado();
                }
            });

        return $diretorias;
    }

    public function pegarListaDesbravadoresQuarentena($desbravadores)
    {
        $nivel = ['Conselheiros', 'Secretaria', 'Administrativo'];
        if ($desbravadores) {
            $nivel = ['Desbravadores'];
        }

        $desbravadores = Usuario::get()
            ->whereIn('nivel', $nivel)
            ->sortByDesc(function ($query) {
                if (isset($query->unidade)) {
                    return $query->pontosQuarentenaAcumulado();
                }
            });

        return $desbravadores;
    }

    public function pegarListaUnidades()
    {
        $unidades = Unidade::get()->sortByDesc(function ($query) {
            return $query->pontosAcumulado();
        });

        return $unidades;
    }
}
