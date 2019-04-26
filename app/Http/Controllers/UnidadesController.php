<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Unidade;

class UnidadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $unidades = Unidade::paginate(20);
        return view('unidades.index',compact('unidades'));
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function store(Request $request)
    {
        Unidade::create($request->all());
        return redirect('/unidades');
    }

    public function edit($id)
    {
        $unidade = Unidade::find($id);
        //dd($unidade);
        return view('unidades.edit',compact('unidade'));
    }

    public function update(Request $request, $id)
    {
        $unidade = Unidade::find($id);
        $unidade->update($request->all());
        return redirect('unidades');
    }
}