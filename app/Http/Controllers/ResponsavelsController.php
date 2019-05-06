<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Responsavel;
use App\Usuario;

class ResponsavelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $id_usuario  = $id;
        $usuario = Usuario::find($id);
        $resposaveis = $usuario->responsaveis;
        return view('responsaveis.index', compact('resposaveis','id_usuario'));
    }

    public function create($id_usuario)
    {
        return view('responsaveis.create', compact('id_usuario'));
    }

    public function store(Request $request)
    {
        $id_usuario = $request['id_usuario'];
        $usuario        = Usuario::find($id_usuario);
        $id_responsavel = Responsavel::create($request->all())->id;
        $usuario->responsaveis()->attach($id_responsavel);
        return redirect('/responsaveis/index/'.$id_usuario)->with('success','Responsavel cadastrado com Sucesso!');
    }

    public function edit($id, $id_usuario)
    {
        $responsavel = Responsavel::find($id);
        $usuario    = Usuario::find($id_usuario);
        return view('responsaveis.edit', compact('responsavel','usuario'));
    }

    public function update(Request $request, $id)
    {        
        
        $responsavel = Responsavel::find($id);
        $responsavel->update($request->all());
        return redirect('/responsaveis/index/'.$request['id_usuario'])->with('success','Responsavel Editado com Sucesso!');
    }

}