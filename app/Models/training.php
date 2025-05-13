<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    /** @use HasFactory<\Database\Factories\TrainingFactory> */
    use HasFactory;


    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function exercises(){
        return $this->hasManyThrough(Exercise::class,Category::class);
    }
}
