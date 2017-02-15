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
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    public static function subcategories(){
      return Category::hasMany('Category', 'parent_id');
    }

    public static function getCategoriesWithChilds(){
      $categories = Category::where('parent_id', 0)->with('subcategories')->get();
      return $categories;
    }
}
