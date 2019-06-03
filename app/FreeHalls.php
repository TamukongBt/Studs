<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FreeHalls extends Model
{
    protected $guarded = ['Building', 'ClassID', 'Capacity','Access', 'Day', 'PeriodID'];
    use SoftDeletes;
    // including the soft delete methods
}
