<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

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

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function getDataPontosAttribute()
    {
        if ($this->attributes['data_pontos']) {
            return (new Carbon($this->attributes['data_pontos']))->format('d/m/Y');
        }
    }
}
