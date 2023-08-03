<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'shortcontent',
        'body',
        'price',
        'image'
    ];
    protected static function boot()
    {
        parent::boot();
    
        static::deleting(function ($product) {
            if ($product->image) {
                Storage::delete($product->image);
            }
        });
    }

}
