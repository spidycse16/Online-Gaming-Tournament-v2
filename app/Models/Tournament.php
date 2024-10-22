<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'tournament_name',
        'match_fee',
        'date_time',
        'game_name',
        'player_number',
        'players_joined',
        'winning_amount',
        'description',
        'image', // If you're also saving the image path
    ];
    use HasFactory;
}
