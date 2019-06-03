<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookedhall extends Model
{
    protected $fillable = ['Building', 'ClassID', 'Capacity','Access','Username', 'Day', 'PeriodID', 'Note'];
    use SoftDeletes;
}
