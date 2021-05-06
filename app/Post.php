<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];

    protected $fillable = ['title', 'user_id'];

    // protected $hidden = ['id'];
    // protected $visible = ['id'];
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
