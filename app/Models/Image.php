<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'url',
    ];

    //creando relacion polimorfica
    public function imageable(){
        return $this->morphTo();
    }

}
