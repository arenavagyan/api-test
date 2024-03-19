<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'worker';
    protected $fillable = ['name','done','task_id'];

    public function task()
    {
       return $this->hasOne(Task::class);
    }
}
