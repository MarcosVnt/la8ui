<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;


class Subcategory extends Model {
	//posts table in database
	protected $table = 'subcategories';

	protected $fillable = ['on_category','name'];
  // returns category of any subcategoria

	public function category()
	{
    return $this->belongsTo('App\Category','on_category');
	}
}