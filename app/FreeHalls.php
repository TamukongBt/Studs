<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FreeHalls extends Model
{
    protected $guarded = ['Building', 'ClassID', 'Capacity','Duration', 'Day', 'PeriodID','Note'];
    use SoftDeletes;
    // including the soft delete methods
}
