<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $table = "posts";

    public function postAndTag(): HasMany
    {
        return $this->hasMany(PostAndTag::class, "post_id", "id");
    }

    public function like(): HasOne
    {
        return $this->hasOne(Like::class, "post_id", "id");
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getDescription($length = 100, $suffix = '...'): string
    {
        $content = $this->content;
        $description = strip_tags((string)$content);
        $l = mb_strlen($description);
        if($l <= $length) return $description;
        $description = preg_replace('~[^A-Za-zА-Я0-9]+$~', '', mb_substr($description, 0, $length));
        return $description.$suffix;
    }

    public function getStatusLike(): int
    {
        return $this->like !== null ? 1 : 0;
    }
}
