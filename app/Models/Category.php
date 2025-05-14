<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'training_id',
        'name',
        'description'
    ];

    public function exercises(){
        return $this->hasMany(Exercise::class);
    }

    //relacion polifmorfica con imagen
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    //relacion polimorfica de muchas a muchos
    public function taggables(){
        return $this->morphToMany(Tag::class,'taggable')->withTimestamps();
    }

}
