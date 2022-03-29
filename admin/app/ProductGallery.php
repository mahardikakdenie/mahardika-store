<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'products_id', 'photo', 'is_default'
    ];

    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
