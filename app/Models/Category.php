<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    public function subcategory() {
      return $this->hasMany('App\Models\Category', 'parent_id');
    }
    public function parent() {
      return $this->belongsTo('App\Models\Category', 'parent_id');
    }
    public static function getCategoriesWithChilds(){
      $categories = Category::where('parent_id', null)->with('subcategory')->get();
      return $categories;
    }
    public static function getHomeCategories(){
      $categories = Category::where('parent_id', 1)->get();
      return $categories;
    }
}
