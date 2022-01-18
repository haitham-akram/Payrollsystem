<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'fname', 'lname', 'gender', 'dob', 'doj',
        'phone', 'address', 'dno', 'designation', 'email', 'type', 'total', 'remaining_hours',
        'created_at', 'updated_at', 'deleted_at'
    ];
    public function contract()
    {
        return $this->hasOne('App\models\Contract', 'employee_id', 'id');
    }
    public function deduction()
    {
        return $this->hasOne('App\models\Deduction');
    }
    public function department()
    {
        return $this->belongsTo('App\models\Department', 'dno', 'dno');
    }
    public function payment_info()
    {
        return $this->hasOne('App\models\Payment');
    }
    public function leave()
    {
        return $this->hasMany('App\models\Leave');
    }
    public function timecard()
    {
        return $this->hasMany('App\models\Timecard');
    }
    public function transaction()
    {
        return $this->hasMany('App\models\Transaction');
    }
}
