<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    // 1対多：投稿は複数のコメントを持つ
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // 多対多：投稿は複数のタグを持つ
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
