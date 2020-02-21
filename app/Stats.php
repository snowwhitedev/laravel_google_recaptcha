<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    protected $guarded = [];

    public function getTimeUsedAttribute()
    {
        return number_format($this->attributes['time_used'], 2) . ' Sec';
    }

    public function getUploadedSizeAttribute()
    {
        return formatSizeUnits($this->attributes['uploaded_size']);
    }

}
