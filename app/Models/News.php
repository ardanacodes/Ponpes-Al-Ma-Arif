<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail'
    ];
    public function comments()
    {
        return $this->hasMany(NewsComment::class);
    }
}
