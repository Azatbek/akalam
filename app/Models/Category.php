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

    public static function buildTree(array $elements, $parentId = null) {
      $result = array();
      foreach ($elements as $element) {
          if($element['parent_id'] == $parentId) {
              $children = self::buildTree($elements, $element['id']);
              $element['childs'] = [];
              if ($children) $element['childs'] = $children;
              $result[$element['id']] = $element;
          }
      }
      return array_values($result);
    }

    public function subcategory() {
      return $this->hasMany('App\Models\Category', 'parent_id');
    }
    public function parent() {
      return $this->belongsTo('App\Models\Category', 'parent_id');
    }
    public function lyrics() {
      $locale = app()->getLocale();
      if ($locale == 'ru') {
        return $this->hasMany('App\Models\Lyrics', 'category_id');
      } else {
        return $this->hasMany('App\Models\Lyrics', 'category_id');
      }
    }
    public static function getCategoriesTree() {
      $elements = Category::get()->toArray();
      $tree = self::buildTree($elements);
      return $tree;
    }

    public static function getHomeSelectedCategories($cats=[]) {
        $locale = app()->getLocale();
        $result = self::with(['lyrics' => function($q) use($locale) {
                    if($locale == 'ru') $q->where('lang', 1)->where('is_published', 1)->take(5);
                    else $q->where('lang', 0)->where('is_published', 1)->take(5);
                  }]);
                  $result->whereIn('id', $cats)->orderBy('id', 'asc');
        return $result->get();
    }
}
