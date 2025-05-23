<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Profile extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'job',
        'phone',
        'website'
    ];

    //Ejemplo de relacion uno a uno
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function address(){
        return $this->hasOne(Address::class);
    }

}

