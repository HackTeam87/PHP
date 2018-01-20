<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $fillable =['title','text','file'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}