<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    //
    use Notifiable;

    protected $table = "responsavels";
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome', 
        'sobrenome',
        'endereco',
        'cep',
        'endereco',
        'complemento',
        'cidade',
        'estado',
        'tel',
        'cel',
        'data_nasc',
        'rg',
        'cpf',
    ];

    public function usuarios(){
        $this->belongsToMany('App\Usuarios','desbravador_responsavel');
    }

}
