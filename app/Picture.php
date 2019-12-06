<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'imgname', 'post_id'
    ];
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
