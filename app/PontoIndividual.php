<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PontoIndividual extends Model
{
    use Notifiable;

    protected $table = "ponto_individuals";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'pontos',
        'descricao',
        'data_pontos',
        'usuario_id'
    ];

    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }
}
