<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'desc',
        'price',
        'discount',
        'price_discount',
        'link',

        'features',
        'delivery_days',
        'revisions',
    ];
}
