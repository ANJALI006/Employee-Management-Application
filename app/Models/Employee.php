<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $guarded = [];

    public function employeeDesignation()
    {
        return $this->hasOne(Designation::class, 'id', 'designation_id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    public function getFormatedJoiningDateAttribute()
    {
        $date = date("m-d-Y", strtotime($this->joining_date));
        return $date;
    }

    protected $appends = ['full_name', 'formated_joining_date'];
}
