<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = ['name','email','image','gender','skills'];

    public function setSkillsAttribute($value)
    {
        $this->attributes['skills'] = json_encode($value);
    }

    public function getSkillsAttribute($value)
    {
        $this->attributes['skills'] = json_decode($value, true);
    }

}
