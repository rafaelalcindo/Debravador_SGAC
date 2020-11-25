<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;
use App\Unidade;
use App\Classes\FormataData;

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desbravadores = Usuario::paginate(20);
        return view('usuarios.index', compact('desbravadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('usuarios.create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formataData = new FormataData($request['data_nasc']);
        $request['data_nasc'] = $formataData->pegarNovaData();

        Usuario::create($request->all());
        return redirect('/usuarios')->with('success', 'Desbravador cadastrado com Sucesso!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        $unidades = Unidade::all();

        return view('usuarios.edit', compact('usuario', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        $formataData = new FormataData($request['data_nasc']);
        $request['data_nasc'] = $formataData->pegarNovaData();

        $usuario->update($request->all());
        return redirect('usuarios')->with('success', 'Atualizado Desbravador com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::whereId($id)->delete();
        return redirect('usuarios')->with('success', 'Desbravador Deletado com Sucesso!');
    }
}
