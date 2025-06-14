<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'slug',
        'image_path',
        'image_local_path'
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relacion de pertenece a, a travez de con ayuda del la libreria Znck (composer require staudenmeir/belongs-to-through   )
    public function training(){
        return $this->belongsToThrough(Training::class,Category::class);
    }

    //Relacion de muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class)->withPivot('data')->withTimestamps();
    }

    //relacion polimorfica de uno a muchos
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    //relacion polimorfica de muchas a muchos
    public function taggables(){
        return $this->morphToMany(Tag::class,'taggable')->withTimestamps();
    }
}
