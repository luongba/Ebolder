<?php

namespace App\models\User;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\models\User\Role', 'user_role');
    }

    public function HistoryLearn()
    {
        return $this->hasMany('App\models\HistoryLearn', 'user_id');
    }

    public function ExamHistoryFinal()
    {
        return $this->hasMany('App\models\Exam\ExamHistoryFinal', 'user_id');
    }


    public function checkPermisionAccess($permisionCheck)
    {
        $roles = auth()->user()->roles;
        foreach ($roles as $role) {
            $permision = $role->permisions;
            if ($permision->contains('key_code', $permisionCheck)) {
                return true;
            }

        }
        return false;

    }
}
