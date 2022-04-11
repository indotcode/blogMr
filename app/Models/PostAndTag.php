<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PostAndTag extends Model
{
    use HasFactory;

    protected $table = "post_and_tags";

    public function post(): HasOne
    {
        return $this->hasOne(Post::class, "id", "post_id");
    }

    public function tag(): HasOne
    {
        return $this->hasOne(Tag::class, "id", "tag_id");
    }
}
