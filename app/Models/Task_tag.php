<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'taskId',
        'tagId',
    ];

    public function tags(){
        return $this->hasOne(Tags::class,'id','tagId');
    }
}
