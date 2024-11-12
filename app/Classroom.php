<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

    protected $fillable = ['Building', 'ClassID', 'Capacity','Access'];


    public function schedules(){ 
        return $this->hasMany('App\Schedule', 'ClassroomID','PeriodID');
    }

}
