<?php

namespace App\Repositories;

use App\PontoIndividual;
use App\Unidade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;


class PontoIndividualRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new PontoIndividual();
    }

    public function filtroIndex($request)
    {
        $pontos = $this->model
            ->leftJoin('usuarios', 'usuarios.id', '=', 'ponto_individuals.usuario_id');

        if (!empty($request->query)) {
            $query = $request->query();

            if (isset($query['search'])) {
                $pontos = $pontos
                    ->orWhere('usuarios.nome', 'like', '%' . $query['search'] . '%');
            }
        }

        return $pontos->paginate(20);
    }

    public function pegarPontosUsuario($id_usuario)
    {
        return $this->model
            ->where('usuario_id', '=', $id_usuario)
            ->get();
    }
}
