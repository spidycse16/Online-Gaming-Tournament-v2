<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function likes()
{
    return $this->belongsToMany(User::class, 'post_likes');
}
public function comments()
{
    return $this->hasMany(Comment::class);
}


    protected $fillable=[
        'title',
        'description',
        'image',
        'likes',
        'user_id'
    ];
    use HasFactory;
}
