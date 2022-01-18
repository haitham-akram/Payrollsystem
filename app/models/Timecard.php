<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timecard extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'id', 'employee_id', 'startTime', 'endTime', 'hours_num', 'month', 'created_at', 'updated_at', 'deleted_at'
    ];
    public function employee()
    {
        return $this->belongsTo('App\models\Employee');
    }
}
