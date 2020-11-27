<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function unidade()
    {
        return $this->belongsTo('App\Unidade');
    }

    public function getDataPontosAttribute()
    {
        if ($this->attributes['data_pontos']) {
            return (new Carbon($this->attributes['data_pontos']))->format('d/m/Y');
        }
    }
}
