<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_evento',
        'ponto_evento',
        'pontos_adicionados',
        'created_at',
        'updated_at'
    ];

    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario', 'desbravador_evento');
    }

    /**
     * Atributtes
     *
     */
    public function getDataEventoAttribute()
    {
        if ($this->attributes['data_evento']) {
            return (new Carbon($this->attributes['data_evento']))->format('d/m/Y');
        }
    }
}
