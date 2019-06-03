<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['CourseCode','CourseName','OptionID','CourseType','Level','LecturerName','LecturerName2', 'DepartmentID'];
    
 
}
