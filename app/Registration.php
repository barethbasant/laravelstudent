<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function Courses()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function Cities()
    {
        return $this->belongsTo('App\Cities', 'city_id');
    }

    public function Branches()
    {
        return $this->belongsTo('App\branch','branch_id');
    }
    
}
