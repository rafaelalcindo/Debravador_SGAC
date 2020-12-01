<?php

namespace App\Repositories;


use App\Unidade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;


class UnidadesRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Unidade();
    }

    public function filtroIndex($request)
    {
        $unidades = $this->model;

        if (!empty($request->query)) {
            $query = $request->query();

            if (isset($query['search'])) {
                $unidades = $unidades
                    ->orWhere('nome', 'like', '%' . $query['search'] . '%')
                    ->orWhere('equipamentos', 'like', '%' . $query['search'] . '%');
            }
        }

        return $unidades->paginate(20);
    }
}
