<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parentId'
    ];

    public function subCategories(){
        return $this->hasMany(Categories::class, 'parentId', 'id')->with('subCategories');
    }
}
