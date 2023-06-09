<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'content',
        'author_name',
        'is_visible',
        'category_id',
        'author_id',
        'slug',
        'youtube',
    ];

    public function category() {
        return $this->belongsTo(PostCategory::class);
    }
}
