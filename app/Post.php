<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Post extends Model
{
    //

	use softDeletes;



	public function getFeaturedAttribute($featured)
	{

		return asset($featured);
	}


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }


protected $fillable = [
        'title', 'content', 'category_id','featured','slug'
    ];


protected $dates = ['deleted_at'];
}
