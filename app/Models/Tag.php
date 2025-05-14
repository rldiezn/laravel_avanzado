<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name'
    ];

    //Relacion de muchos a muchos
    public function exercises(){
        return $this->belongsToMany(Exercise::class)->withPivot('data')->withTimestamps();
    }

    //relacion inversa muchos a muchos polimorfica
    public function categories(){
        return $this->morphedByMany(Category::class,"taggable");
    }

    //relacion inversa muchos a muchos polimorfica
    public function exercisesable(){
        return $this->morphedByMany(Exercise::class,"taggable");
    }
}
