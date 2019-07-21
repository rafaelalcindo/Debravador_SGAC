<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Responsavel;
use App\Usuario;
use App\Especialidade;
use App\Classe;
use App\Classes\FormataData;

class ClassesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $id_usuario = $id;
        $usuario = Usuario::find($id);
        $classes = $usuario->classes;

        return view('classes.index', compact('classes', 'id_usuario'));
    }

    public function create($id_usuario)
    {
        return view('classes.create', compact('id_usuario'));
    }

    public function store(Request $request)
    {
        $id_usuario = $request['usuario_id'];
        $usuario = Usuario::find($id_usuario);
        $data_formatada = new FormataData($request['data_conclusao']);
        $request['data_conclusao'] = $data_formatada->pegarNovaData();
        $id_classe = Classe::create($request->all())->id;
        return redirect('/classes/index/'.$id_usuario)->with('success', 'Classe cadastrado com sucesso!');
    }

    public function edit($id, $id_usuario)
    {
        $classe = Classe::find($id);
        $usuario = Usuario::find($id_usuario);
        return view('classes.edit', compact('classe', 'id_usuario'));
    }

    public function update(Request $request, $id)
    {
        $classe = Classe::find($id);
        $data_formatada = new FormataData($request['data_conclusao']);
        $request['data_conclusao'] = $data_formatada->pegarNovaData();
        $classe->update($request->all());
        return redirect('/classes/index/'.$request['usuario_id'])->with('success', 'Classe Editado com Sucesso!');
    }

    public function destroy($id, $id_usuario)
    {
        Classe::whereId($id)->delete();
        return redirect('/classes/index/'.$id_usuario)->with('success', 'Classe deletado com Sucesso!');
    }

    public function show($id, $id_usuario)
    {
        $usuario = Usuario::find($id_usuario);
        $classe = Classe::find($id);
        return view('classes.show', compact('usuario', 'classe', 'id_usuario'));
    }

}
