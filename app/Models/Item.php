<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Item extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'is_visible',
        'desc',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function plans() {
        return $this->hasMany(ItemPlan::class, 'item_id');
    }
}
