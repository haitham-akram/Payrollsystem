<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'dno';
    protected $fillable = ['dno', 'dname', 'created_at', 'updated_at', 'deleted_at'];
    public function employee()
    {
        return $this->hasMany('App\models\Employee');
    }
}
