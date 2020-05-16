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

        return view('home', compact('desbravadores', 'unidades'));
    }
}
