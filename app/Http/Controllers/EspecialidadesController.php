<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Responsavel;
use App\Usuario;
use App\Especialidade;
use App\Classes\FormataData;

class EspecialidadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $id_usuario = $id;
        $usuario = Usuario::find($id);
        $especialidades = $usuario->especialidades;
        return view('especialidades.index', compact('especialidades', 'id_usuario'));
    }

    public function create($id_usuario)
    {
        return view('especialidades.create', compact('id_usuario'));
    }

    public function store(Request $request)
    {
        $id_usuario = $request['usuario_id'];
        $usuario = Usuario::find($id_usuario);
        $data_formatada =  new FormataData($request['conclusao']);
        $request['conclusao'] = $data_formatada->pegarNovaData();
        $id_especialidade = Especialidade::create($request->all())->id;
        return redirect('/especialidades/index/'.$id_usuario)->with('success', 'Especialidade cadastrado com sucesso!');
    }

    public function edit($id, $id_usuario)
    {
        $especialidade = Especialidade::find($id);
        $usuario = Usuario::find($id_usuario);
        return view('especialidades.edit', compact('especialidade', 'id_usuario'));
    }

    public function update(Request $request, $id)
    {
        $especialidade = Especialidade::find($id);
        $especialidade->update($request->all());
        return redirect('/especialidades/index/'.$request['usuario_id'])->with('success', 'Especialidade Editado com sucesso!');
    }

    public function destroy($id, $id_usuario)
    {
        Especialidade::whereId($id)->delete();
        return redirect('/especialidades/index/'.$id_usuario)->with('success', 'Especialidade deletado com Sucesso!');
    }

    public function show($id, $id_usuario)
    {
        $usuario = Usuario::find($id_usuario);
        $especialidade = Especialidade::find($id);
        return view('especialidades.show', compact('usuario', 'especialidade', 'id_usuario'));
    }
}
