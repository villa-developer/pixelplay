<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['user_id', 'task_status_id', 'title', 'body'];


    public function status() 
    {
        return $this->belongsTo(TaskStatus::class);    
    }

}
