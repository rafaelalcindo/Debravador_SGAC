<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class DesbravadorResponsavel extends Model
{
    //
    use Notifiable;

    protected $table = "desbravador_responsavel";
    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id', 
        'responsavel_id'
    ];

}