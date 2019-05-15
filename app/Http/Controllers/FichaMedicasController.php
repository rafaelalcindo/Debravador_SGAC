<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\FichaMedica;
use App\Usuario;

class FichaMedicasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $id_usuario = $id;
        $usuario = Usuario::find($id);
        $fichaMedicas = $usuario->fichaMedica;
        //$fichaMedicas
        return view('ficha-medicas.index', compact('fichaMedicas','id_usuario'));
    }

    public function create($id_usuario)
    {
        return view( 'ficha-medicas.create', compact('id_usuario') );
    }


}