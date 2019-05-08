<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class PontoUnidade extends Model
{
    use Notifiable;

    protected $table = "ponto_unidades";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'pontos',
        'descricao',
        'data_pontos',
        'unidade_id'
    ];

    public function unidade(){
        return $this->belongsTo('App\Unidade');
    }

}
