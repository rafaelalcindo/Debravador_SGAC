<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Especialidade;
use App\Classes\FormataData;
use App\Repositories\EspecialidadesRepository;

class EspecialidadesApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->repository = new EspecialidadesRepository();
    }

    public function especialidadeUsuario($id_usuario)
    {
        $especialidades = $this->repository->pegarEspecialidadeUsuario($id_usuario);

        return response()->json($especialidades);
    }
}
