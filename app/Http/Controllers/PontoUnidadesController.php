<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Unidade;
use App\Usuario;
use App\DesbravadorResponsavel;

class PontoUnidadesController extends Controller
{
    protected $table = "ponto_individuals";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'pontos', 'descricao', 'data_pontos', 'unidade_id','created_at','updated_at'
    ];

    public function unidade(){
        return $this->belongsTo('App\Unidade');
    }

}