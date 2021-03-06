<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'uuid', 'name', 'email', 'number', 'address', 'trasaction_total', 'transaction_status'
    ];

    protected $hidden = [];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id');
    }

    // == scope == //

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
