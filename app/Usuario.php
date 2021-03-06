<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Storage;
use App\PontoIndividual;
use App\Quarentena;
use App\DesbravadorEvento;
use Carbon\Carbon;

class Usuario extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = "usuarios";
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'sobrenome', 'login', 'password', 'endereco', 'ativo', 'nivel',
        'cep', 'endereco', 'complemento', 'cidade', 'estado', 'tel', 'cel', 'data_nasc',
        'rg', 'cpf', 'tamanho_camisa', 'unidade_id', 'qr_code', 'foto_perfil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Criação de atributos
     */
    private $_arrayNivel = [
        1 => 'Administrativo',
        2 => 'Secretaria',
        3 => 'Conselheiros',
        4 => 'Desbravadores'
    ];

    /**
     * Função JWT
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Fim da Função JWT
     */

    public function unidade()
    {
        return $this->belongsTo('App\Unidade');
    }

    public function responsaveis()
    {
        return $this->belongsToMany('App\Responsavel', 'desbravador_responsavel', 'usuario_id', 'responsavel_id')->withTimestamps();
    }

    public function eventos()
    {
        return $this->belongsToMany('App\Evento', 'desbravador_evento', 'usuario_id', 'evento_id')->withTimestamps();
    }

    public function horaPontos()
    {
        return $this->belongsToMany('App\HoraPonto', 'desbravador_hora_pontos', 'usuario_id', 'hora_ponto_id')->withPivot('data_chegada', 'hora_chegada')->withTimestamps();
    }

    public function fichaMedica()
    {
        return $this->hasMany('App\FichaMedica');
    }

    public function especialidades()
    {
        return $this->hasMany('App\Especialidade');
    }

    public function classes()
    {
        return $this->hasMany('App\Classe');
    }

    public function pontosAcumulado()
    {
        $pontos = PontoIndividual::select('pontos')->where('usuario_id', $this->id)->sum('pontos');
        return $pontos ? $pontos : 0;
    }

    public function pontosQuarentenaAcumulado()
    {
        $pontos = Quarentena::select('pontos')->where('usuario_id', $this->id)->sum('pontos');
        return $pontos ? $pontos : 0;
    }

    /**
     * Checar se o Usuário participou do evento
     */
    public function verificarParticipacaoEvento($user_id, $event_id)
    {
        $event = DesbravadorEvento::where('usuario_id', $user_id)
            ->where('evento_id', $event_id)
            ->first();

        if (empty($event)) {
            return false;
        }
        return true;
    }

    /**
     * Atributtes
     *
     */
    public function getDataNascAttribute()
    {
        if ($this->attributes['data_nasc']) {
            return (new Carbon($this->attributes['data_nasc']))->format('d/m/Y');
        }
    }

    public function getNivelAttribute()
    {
        return $this->_arrayNivel[$this->attributes['nivel']];
    }

    public function getQrCodeAttribute()
    {
        if ($this->attributes['qr_code']) {
            return Storage::url('public/QrCode/' . $this->attributes['qr_code']);
        }
    }

    public function getFotoPerfilAttribute()
    {
        if ($this->attributes['foto_perfil']) {
            return Storage::url('public/image/' . $this->attributes['foto_perfil']);
        }
    }

    public function getQRCodeName()
    {
        return $this->attributes['qr_code'];
    }
}
