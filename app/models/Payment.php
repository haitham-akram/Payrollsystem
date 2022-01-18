<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'employee_id', 'methode', 'bank_account', 'notify_email', 'created_at', 'updated_at', 'deleted_at'
    ];
    public function employee()
    {
        return $this->belongsTo('App\models\Employee');
    }
}
