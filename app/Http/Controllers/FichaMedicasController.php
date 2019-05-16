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

    public function store(Request $request)
    {
        FichaMedica::create($request->all());
        return redirect('ficha-medicas/index/'.$request['usuario_id'])->with('success','Ficha Médica cadastrado com Sucesso!');
    }

    public function edit($id, $id_usuario)
    {
        $fichaMedica = FichaMedica::find($id);
        return view( 'ficha-medicas.edit', compact('fichaMedica', 'id_usuario') );
    }

    public function update(Request $request, $id)
    {
        $fichaMedica = FichaMedica::find($id);
        $fichaMedica->update($request->all());
        return redirect('ficha-medicas/index/'.$request['usuario_id'])->with('success','Ficha Médica Atualizado com Sucesso!');
    }

}