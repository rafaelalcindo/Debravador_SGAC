<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Usuario;
/**
 * classe Especialidade
 *
 * @return void
 */
class Especialidade extends Model
{
    use Notifiable;

    protected $table = "especialidades";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nome',
        'area',
        'instrutor',
        'conclusao',
        'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
