<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoCard extends Model
{
    use HasFactory;
    protected $table = 'auto_cards';
    protected $fillable = [
        'order_id',
        'username',
        'telco',
        'serial',
        'amount',
        'receive_amount',
        'code',
        'status',

    ];
}
