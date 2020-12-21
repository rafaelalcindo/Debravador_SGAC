<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class DesbravadorEvento extends Model
{
    //
    use Notifiable;

    protected $table = "desbravador_evento";
    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id',
        'evento_id'
    ];
}
