<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class Quarentena extends Model
{
    use Notifiable;

    protected $table = 'quarentenas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'descricao',
        'pontos',
        'desbravador',
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
