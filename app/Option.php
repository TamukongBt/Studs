<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['Optionname',  'OptionID', 'Level', 'DepartmentID','FacultyID'];
}
