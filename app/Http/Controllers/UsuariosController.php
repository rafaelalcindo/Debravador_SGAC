<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Usuario;
use App\Unidade;
use App\Classes\FormataData;
use App\Repositories\UsuarioRepository;


class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->repository = new UsuarioRepository();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $desbravadores = $this->repository->filtroIndex($request);
        $filtro = $request->query();

        return view('usuarios.index', compact('desbravadores', 'filtro'));
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
        $request->validate(
            [
                'nome' => 'required|max:100',
                'sobrenome' => 'required|max:100',
                'login' => 'required|max:100',
                'password' => 'required',
                'endereco' => 'required|max:80',
                'complemento' => 'required|max:100',
                'tamanho_camisa' => 'required|max:10',

            ]
        );

        $formataData = new FormataData($request['data_nasc']);
        $request['data_nasc'] = $formataData->pegarNovaData();
        $request['password'] = Hash::make($request['password']);

        $usuario = Usuario::create($request->all());

        $nome_arquivo = $this->repository->criarQrcode($usuario);
        $this->repository->atualizarQrCodeUsuario($usuario->id, $nome_arquivo);

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

        $request->validate(
            [
                'nome' => 'required|max:100',
                'sobrenome' => 'required|max:100',
                'login' => 'required|max:100',
                'endereco' => 'required|max:80',
                'complemento' => 'required|max:100',
                'tamanho_camisa' => 'required|max:10'
            ]
        );

        $usuario = Usuario::find($id);

        $formataData = new FormataData($request['data_nasc']);
        $request['data_nasc'] = $formataData->pegarNovaData();

        if (!empty($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        } else {
            unset($request['password']);
        }

        $request['qr_code'] = $this->repository->criarQrcode($usuario);

        $usuario->update($request->all());
        return redirect('usuarios')->with('success', 'Desbravador Atualizado com Sucesso!');
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

    /**
     * Fazer o Download do QrCode do Usuário
     *
     * @param int $id
     *
     * @return path
     */

    public function qrCodeUsuario($id)
    {
        $usuario = Usuario::find($id);
        return $this->repository->pegarQrCodePath($usuario);
    }
}
