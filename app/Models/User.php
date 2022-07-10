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
        'balance',
        'total_recharge',
        'discount',
        'phone',
        'ban',
        'password',
        'access_token',
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
                    return "<b style='color: dark;'>Thành viên</b>";
                    break;
                case '1':
                    return "<b style='color: blue;'>Cộng Tác Viên</b>";
                    break;
                case '2':
                    return "<b style='color: green'>Tổng Đại Lý</b>";
                    break;
                case '9':
                    return "<b style='color: red;'>Quản trị viên</b>";
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
