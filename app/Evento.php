<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_evento',
        'created_at',
        'updated_at'
    ];

    public function usuarios(){
        return $this->belongsToMany('App\Usuario','desbravador_evento');
    }

}
