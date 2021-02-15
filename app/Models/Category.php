<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model {
	//posts table in database
	protected $table = 'categories';

	protected $fillable = ['name'];
  // returns all posts on that category

	public function posts()
	{
		return $this->hasMany('App\Post','on_post');
	}
	public function subcategories()
	{
		return $this->hasMany('App\Subcategory','on_category');
	}

	

}