<?php

namespace App\Repositories;

use App\PontoUnidade;
use App\Unidade;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;


class PontoUnidadesRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new PontoUnidade();
    }

    public function filtroIndex($request)
    {
        $pontos = $this->model
            ->select(
                'ponto_unidades.id as id',
                'pontos',
                'descricao',
                'data_pontos',
                'unidade_id',
                'ponto_unidades.created_at',
                'ponto_unidades.updated_at',
                'nome',
                'equipamentos'
            )
            ->leftJoin('unidades', 'unidades.id', '=', 'ponto_unidades.unidade_id');

        if (!empty($request->query)) {
            $query = $request->query();

            if (isset($query['search'])) {
                $pontos = $pontos
                    ->orWhere('unidades.nome', 'like', '%' . $query['search'] . '%');
            }

            if (isset($query['search_descricao'])) {
                $pontos = $pontos
                    ->orWhere('descricao', 'like', '%' . $query['search_descricao'] . '%');
            }

            if (isset($query['unidade_selecao'])) {
                $pontos = $pontos
                    ->where('unidades.id', '=', $query['unidade_selecao']);
            }
        }

        return $pontos->orderBy('created_at', 'desc')->paginate(20);
    }

    public function pegarPontosUsuarioUnidade($id_usuario)
    {
        $usuario = Usuario::find($id_usuario);
        $unidade_id = $usuario->unidade_id;

        return $this->model
            ->where('unidade_id', '=', $unidade_id)
            ->orderBy('data_pontos', 'asc')
            ->get();
    }
}
