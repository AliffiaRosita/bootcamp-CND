<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['author_id','title','content','is_draft','image_cover'];

    public function author()
    {
        return $this->hasOne('App\User','id','author_id');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category','post_categories','post_id','category_id');
    }

}
