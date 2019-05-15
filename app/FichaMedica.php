<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class FichaMedica extends Model
{
    use Notifiable;
    protected $table = "ficha_medicas";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'plano_saude',
        'carteira_nac_saude',
        'doenc_teve',
        'problema_saude',
        'alergia',
        'tipo_sanguineo',
        'usuario_id'
    ];

    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }
}
