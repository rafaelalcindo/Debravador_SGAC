<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    //
    protected $table = "unidades";
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome', 'equipamentos'
    ];

    public function usuarios(){
        return $this->hasMany('App\Usuario');
    }
}
