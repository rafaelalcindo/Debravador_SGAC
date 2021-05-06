<?php

namespace App\Repositories;

use App\Quarentena;
use App\Repositories\UsuarioRepository;
use Carbon\Carbon;

class QuarentenaRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Quarentena();
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function filtroIndex($request)
    {
        $pontos = $this->model
            ->select(
                'quarentenas.id as id',
                'pontos',
                'descricao',
                'data_pontos',
                'usuario_id',
                'quarentenas.created_at as created_at',
                'quarentenas.updated_at as updated_at',
                'nome',
                'sobrenome'
            )
            ->leftJoin('usuarios', 'usuarios.id', '=', 'quarentenas.usuario_id');

        if (!empty($request->query)) {
            $query = $request->query();

            if (isset($query['search'])) {
                $pontos = $pontos
                    ->orWhere('usuarios.nome', 'like', '%' . $query['search'] . '%');
            }

            if (isset($query['search_descricao'])) {
                $pontos = $pontos
                    ->orWhere('descricao', 'like', '%' . $query['search_descricao'] . '%');
            }
        }

        return $pontos->orderBy('created_at', 'desc')->paginate(20);
    }

    public function pegarPontoUsuario($id_usuario)
    {
        return $this->model
            ->where('usuario_id', '=', $id_usuario)
            ->orderBy('data_pontos', 'asc')
            ->get();
    }

    public function adicionarPontoUsuarioQuarentena($id_usuario, $descricao, $pontos, $desbravador)
    {
        $data = new Carbon();

        $dados = [
            'pontos' => $pontos,
            'descricao' => $descricao,
            'usuario_id' => $id_usuario,
            'data_pontos' => $data,
            'desbravador' => $desbravador
        ];

        $resu = Quarentena::create($dados);
        if ($resu) {
            return true;
        }

        return false;
    }
}
