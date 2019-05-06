<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
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
        'nome', 'sobrenome','login', 'password','endereco','ativo','nivel',
        'cep','endereco','complemento','cidade','estado','tel','cel','data_nasc',
        'rg','cpf','tamanho_camisa','unidade_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function unidade(){
        return $this->belongsTo('App\Unidade');
    }

    public function responsaveis(){
        return $this->belongsToMany('App\Responsavel','desbravador_responsavel', 'usuario_id', 'responsavel_id')->withTimestamps();
    }
    
}