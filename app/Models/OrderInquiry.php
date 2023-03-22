<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class OrderInquiry extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'order_inquiry';

    protected $fillable = [
        'status',
        'email',
        'full_name',
        'message',
        'interest_product',
        'phone',
        'company',
    ];
}
