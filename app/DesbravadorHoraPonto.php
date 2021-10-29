<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DesbravadorHoraPonto extends Model
{
    //
    use Notifiable;

    protected $table = "desbravador_hora_pontos";
    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id',
        'hora_ponto_id',
        'data_chegada',
        'hora_chegada',
        'created_at',
        'updated_at'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
