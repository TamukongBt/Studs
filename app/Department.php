<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['DepartmentID', 'DepartmentName', 'FacultyName','FacultyID'];
}
