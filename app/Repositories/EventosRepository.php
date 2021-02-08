<?php

namespace App\Repositories;

use App\Evento;
use App\Usuario;
use App\Repositories\PontoIndividualRepository;
use Illuminate\Support\Facades\DB;

class EventosRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Evento();
        $this->pontoIndividualRepository = new PontoIndividualRepository();
    }

    public function atualizarPersonalizado($evento_id, $dados = [])
    {
        $evento = Evento::find($evento_id);
        if ($evento->update($dados)) {
            return true;
        }
        return false;
    }

    public function pegarEventoAno($ano)
    {
        return $this->model
            ->whereYear('data_evento', '=', $ano)
            ->orderBy('data_evento', 'DESC')
            ->get();
    }

    public function pegarDesbravadorDentroEvento($id_evento)
    {
        return $this->model
            ->where('id', '=', $id_evento)
            ->with('usuarios')
            ->first();
    }

    public function adicionarDesbravadorEvento($request)
    {
        $query = $request->query();

        $usuario = Usuario::find($query['usuario_id']);

        $usuario->eventos()->attach($query['evento_id']);

        return true;
    }

    public function removerDesbravadorEvento($request)
    {
        $query = $request->query();

        $usuario = Usuario::find($query['usuario_id']);

        $usuario->eventos()->detach($query['evento_id']);

        return true;
    }

    public function pegarDesbravadorForaEvento($id_evento)
    {
        $lista_ids = [];
        $desbra_eventos = DB::table('desbravador_evento')
            ->where('evento_id', '=', $id_evento)
            ->get();

        foreach ($desbra_eventos as $idx => $pivot) {
            $lista_ids[] = $pivot->usuario_id;
        }

        return DB::table('usuarios')
            ->whereNotIn('id', $lista_ids)
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

    public function adicionarPontosEventos($request)
    {
        $query = $request->query();
        $id_evento = $query['evento_id'];

        $desbra_eventos = DB::table('desbravador_evento')
            ->where('evento_id', '=', $id_evento)
            ->get();

        $evento = Evento::find($id_evento);
        foreach ($desbra_eventos as $idx => $pivot) {
            $this->pontoIndividualRepository->adicionarPontoUsuario($pivot->usuario_id, $evento->descricao, $evento->ponto_evento);
        }

        $dados = [
            'pontos_adicionados' => true
        ];

        return $this->atualizarPersonalizado($id_evento, $dados);
    }
}
