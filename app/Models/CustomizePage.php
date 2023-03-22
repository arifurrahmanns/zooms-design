<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CustomizePage extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'customize_pages';

    protected $fillable = [
        'name',
        'key',
        'value',
        'text1',
        'text2',
        'footer_url1',
        'footer_url2',
        'footer_url3',
        'footer_url4',
        'contact_now_url',
        'footer_title',
    ];
}
