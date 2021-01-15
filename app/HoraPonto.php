<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HoraPonto extends Model
{
    protected $table = 'hora_pontos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'descricao',
        'data_programacao',
        'hora_programacao',
        'pontos',
        'created_at',
        'updated_at'
    ];

    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario', 'desbravador_hora_pontos');
    }

    /**
     * Atributtes
     *
     */
    public function getDataProgramacaoAttribute()
    {
        if ($this->attributes['data_programacao']) {
            return (new Carbon($this->attributes['data_programacao']))->format('d/m/Y');
        }
    }
}
