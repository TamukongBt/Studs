<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'title','LecturerName', 'email', 'telephone','DepartmentID','FacultyID'
    ];
    
   
   
}
