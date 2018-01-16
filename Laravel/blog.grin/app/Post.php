<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'category_id',
    ];

	    protected $hidden =['file'];

public function category()
{
    return $this->belongsTo('App\Category');
}





}
