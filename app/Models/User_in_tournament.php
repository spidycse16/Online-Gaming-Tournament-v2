<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_in_tournament extends Model
{
    protected $fillable=[
        'user_id',
        'tournament_id',
    ];
    use HasFactory;
}
