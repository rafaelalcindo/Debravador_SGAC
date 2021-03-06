<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HomeRepository;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->repository = new HomeRepository();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $desbravadores = $this->repository->pegarListaDesbravadores();
        $unidades = $this->repository->pegarListaUnidades();
        $diretorias = $this->repository->pegarListaDiretorias();

        $desbravadorQuarentenas = $this->repository->pegarListaDesbravadoresQuarentena(true);
        $diretoriaQuarentenas = $this->repository->pegarListaDesbravadoresQuarentena(false);

        return view('home', compact('desbravadores', 'unidades', 'diretorias', 'desbravadorQuarentenas', 'diretoriaQuarentenas'));
    }
}
