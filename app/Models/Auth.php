<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth extends Authenticatable
{
    use Notifiable;

    protected $table = 'operador';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'cpf', 'senha'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['senha', 'remember_token'];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function username()
    {
        return $this->cpf;
    }
}
