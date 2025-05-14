<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'commentable_id',
        'commentable_type',
        'url',
    ];

    //creando relacion polimorfica
    public function imageable(){
        return $this->morphTo();
    }
}
