<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use App\Notifications\UserResetPassword;

class CiaMineraUsuario extends Model implements AuthenticatableContract ,CanResetPasswordContract
{
    use Authenticatable;
    use  Notifiable;
    use CanResetPassword;
    protected $table = 'cia_minera_usuario';
    protected $keyType = 'string';
    protected $primaryKey = 'rut';
    protected $fillable = [
    'rut', 'password'
];


protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword () {

return $this->password;

}
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }
}
