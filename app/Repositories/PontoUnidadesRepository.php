<?php

namespace App\Repositories;

use App\PontoUnidade;
use App\Unidade;
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
            ->leftJoin('unidades', 'unidades.id', '=', 'ponto_unidades.unidade_id');

        if (!empty($request->query)) {
            $query = $request->query();

            if (isset($query['search'])) {
                $pontos = $pontos
                    ->orWhere('unidades.nome', 'like', '%' . $query['search'] . '%');
            }
        }

        return $pontos->paginate(20);
    }
}
