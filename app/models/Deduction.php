<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deduction extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'employee_id', 'tax_deduction', 'leave_deduction',
        'Provident_Fund', 'welfare_Fund', 'loan_deduction', 'created_at',
        'updated_at', 'deleted_at'
    ];
    public function employee()
    {
        return $this->belongsTo('App\models\Employee');
    }
}
