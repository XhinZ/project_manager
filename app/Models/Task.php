<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['name', 'description', 'status', 'location', 'project_id'];

    public function project() {
        $this->belongsTo('App\Models\Project');
    }

    public function skills() {
        return $this->belongsToMany('App\Models\Skill', 'task_skill', 'task_id' , 'skill_id');
    }


    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
