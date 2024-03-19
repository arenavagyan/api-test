<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ['title','description','is_completed'];

    public function worker()
    {
       return $this->hasOne(Worker::class);
    }
    public function subtasks()
    {
        return $this->hasMany(Subtask::class);
    }
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

}
