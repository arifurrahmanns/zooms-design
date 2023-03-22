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
        'slug',
        'contact_sale_url',
        'is_popular',
    ];

    public function category() {
        return $this->belongsTo(DesignCategory::class);
    }

    public function plans() {
        return $this->hasMany(ItemPlan::class, 'item_id');
    }

    public static function withPlans($slug = null) {

        $query = Item::with([
            'plans' => function ($q) {
                $q->select([
                    'id', 'title', 'sub_title', 'desc', 'features',
                    'delivery_days', 'revisions', 'price', 'link', 'item_id', 'price_discount', 'discount',
                ]);
            },
            'media',
            'category' => fn ($q) => $q->select('id', 'name', 'slug'),
        ])
            ->select([
                'id', 'title', 'desc', 'category_id', 'slug',
            ])
            ->where('is_visible', 1);

        if ($slug != null) {
            $query->whereHas('category', function($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }
        return $query;
    }
}
