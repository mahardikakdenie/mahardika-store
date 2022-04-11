<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function scopeEntities($query, $entities)
    {
        if ($entities != null || $entities != '') {
            $entities = str_replace(' ', '', $entities);
            $entities = explode(',', $entities);
            try {
                return $query = $query->with($entities);
            } catch (\Illuminate\Database\Eloquent\RelationNotFoundException $e) {
                return Json::exception(null, validator()->errors()); //Json::exception(message, error, status=false)
            }
        }
    }
}
