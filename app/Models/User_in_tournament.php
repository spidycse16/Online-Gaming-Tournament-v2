<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_in_tournament extends Model
{

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    protected $fillable=[
        'user_id',
        'tournament_id',
        'rounds',
        'eliminated'
    ];
    use HasFactory;
}

