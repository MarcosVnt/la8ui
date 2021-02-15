<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Posts extends Model {
	//posts table in database
	protected $guarded = [];


	 // posts has many comments
  // returns all comments on that post
	public function comments()
	{
		return $this->hasMany('App\Comments','on_post');
	}
	  // returns the instance of the user who is author of that post

	public function author()
	{
		return $this->belongsTo('App\User','author_id');
	}
 

 	public function categoriaNombre()
	{
		return $this->belongsTo('App\Category','category_id');
	}
 	public function subcategoriaNombre()
	{
		return $this->belongsTo('App\Subcategory','subcategory_id');
	}
  
}