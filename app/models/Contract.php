<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;
    protected $fillable = ['id', 'base', 'hours_num', 'paid_per_hour', 'employee_id', 'created_at', 'updated_at'];

    public function employee()
    {
        return $this->belongsTo('App\models\Employee', 'employee_id');
    }
}
