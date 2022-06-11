<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
     

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){

        $this->attributes['password'] = Hash::make($value);
    }

    protected function nameRole(): Attribute
    {   
        return Attribute::make(function () {
            switch($this->role) {
                case '0':
                    return "Thành viên";
                    break;
                case '1':
                    return "Đại Lý C1";
                    break;
                case '9':
                    return "Quản trị viên";
                    break;
                default:
                return "unknown role";
                    break;
            };
        });
    }

    protected function formatBalance(): Attribute
    {
        return Attribute::make(
            get : fn ($value) => number_format($this->balance),
        );
    }


}
