<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'employee_id', 'amount', 'month', 'created_at', 'updated_at', 'deleted_at'
    ];
    public function employee()
    {
        return $this->belongsTo('App\models\Employee', 'employee_id', 'id');
    }
}
