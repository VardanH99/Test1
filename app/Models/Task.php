<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'adminId',
        'userId'
    ];

    public function adminInfo(){
       return $this->hasOne(User::class,'id','adminId');
    }
    public function userInfo(){
        return $this->hasOne(User::class,'id','userId');
    }
    public function taskTags(){
        return $this->hasMany(Task_tag::class,'taskId','id')->with('tags');
    }
   
}
