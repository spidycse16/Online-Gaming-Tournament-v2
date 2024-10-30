<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocbase extends Model
{
    protected $fillable=[
        'title',
        'image',
        'views',
        'likes',
        'downloads',
        'description',
        'tags',
        'th_level',
        'link',
    ];
    use HasFactory;
}
