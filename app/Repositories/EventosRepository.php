<?php

namespace App\Repositories;

use App\Evento;
use App\Usuario;
use App\Repositories\PontoIndividualRepository;

class EventosRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Evento();
        $this->pontoIndividualRepository = new PontoIndividualRepository();
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

    public function addDesbravaPontos($request)
    {
        $query = $request->query();
        $user_id = $query['user_id'];
        $event_id = $query['event_id'];
        $pontos = $query['pontos'];
        $descricao = $query['descricao'];

        $usuario = Usuario::find($user_id);
        $usuario->eventos()->attach($event_id);

        return $this->pontoIndividualRepository->adicionarPontoUsuario($user_id, $descricao, $pontos);
    }
}
