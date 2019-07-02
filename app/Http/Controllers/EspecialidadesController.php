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
}
