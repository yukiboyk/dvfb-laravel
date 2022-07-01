<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'name_key',
        'name_value'
    ];

    public static function getValuebyKey($name_key){
        $getName = self::where('name_key',$name_key)->first();
        if($getName){
            return $getName->name_value;
        }
        return 'error database';
    }
}
