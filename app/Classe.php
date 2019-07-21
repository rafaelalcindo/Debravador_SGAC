<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Usuario;

/**
 * classe Classes
 *
 * @return void
 */
class Classe extends Model
{
    use Notifiable;

    protected $table = 'classes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nome',
        'instrutor',
        'data_conclusao',
        'usuario_id',
        'created_at',
        'updated_at'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
