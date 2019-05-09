<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PontoUnidade;

class Unidade extends Model
{
    //
    protected $table = "unidades";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nome', 'equipamentos','created_at','updated_at'
    ];

    public function usuarios(){
        return $this->hasMany('App\Usuario');
    }

    public function pontosAcumulado()
    {        
        $pontos = PontoUnidade::select('pontos')->where('unidade_id',$this->id)->sum('pontos');
        return $pontos? $pontos : 0;
    }
}
