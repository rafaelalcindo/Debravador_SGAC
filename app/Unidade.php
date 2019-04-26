<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
