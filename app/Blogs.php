<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    //
    //use Notifiable;

    protected $fillable = [
        'user_id','title', 'description', 'image'
    ];


    public function users(){
        return $this->hasMany(User::Class);
    }

}
