<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /** @use HasFactory<\Database\Factories\TrainingFactory> */
    use HasFactory;


    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function exercises(){
        return $this->hasManyThrough(Exercise::class,Category::class);
    }

    //relacion polifmorfica con imagen
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
