<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;
use App\Evento;
use App\Classes\FormataData;
use App\Repositories\EventosRepository;
use Carbon\Carbon;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->repository = new EventosRepository();
    }

    public function index()
    {
        $eventos = Evento::paginate(20);
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('eventos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $usuarios = [];

        if (isset($request['check_desbravador'])) {
            $usuarios = Usuario::whereIn('id', $request['check_desbravador'])->get();
        }

        $data_formatada =  new FormataData($request['data_evento']);
        $request['data_evento'] = $data_formatada->pegarNovaData();

        $eventoId = Evento::create($request->all())->id;
        foreach ($usuarios as $idx => $usuario) {
            $usuario->eventos()->attach($eventoId);
        }
        return redirect('/eventos')->with('success', 'Evento cadastrado com sucesso');
    }

    public function edit($id)
    {
        $evento = Evento::find($id);
        $usuarios = Usuario::all();
        // $evento->data_evento = Carbon::parse($evento->data_evento)->format('d/m/Y');
        return view('eventos.edit', compact('evento', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $usuarios = usuario::all();
        foreach ($usuarios as $idx => $usuario) {
            $usuario->eventos()->detach($id);
        }

        $usuarios = [];

        if (isset($request['check_desbravador'])) {
            $usuarios = Usuario::whereIn('id', $request['check_desbravador'])->get();
        }

        $data_formatada =  new FormataData($request['data_evento']);
        $request['data_evento'] = $data_formatada->pegarNovaData();

        $evento = Evento::find($id);
        $evento->update($request->all());

        foreach ($usuarios as $idx => $usuario) {
            $usuario->eventos()->attach($id);
        }

        return redirect('/eventos')->with('success', 'Evento editado com sucesso');
    }

    public function adicionarPontosEventos(Request $request)
    {
        $resu = $this->repository->adicionarPontosEventos($request);
        return response()->json(['message' => $resu]);
    }
}
