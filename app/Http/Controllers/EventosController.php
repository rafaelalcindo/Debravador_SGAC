<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;
use App\Evento;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $eventos = Evento::paginate(20);
        return view('eventos.index',compact('eventos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('eventos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        
    }

}