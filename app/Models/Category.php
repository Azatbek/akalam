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
        return $this->hasMany('App\Models\Lyrics', 'category_id')->take(5);
      } else {
        return $this->hasMany('App\Models\Lyrics', 'category_id')->take(5);
      }
    }
    public static function getCategoriesTree() {
      $elements = Category::where('is_published',1)->get()->toArray();
      $tree = self::buildTree($elements);
      return $tree;
    }

    public static function getHomeSelectedCategories($cats=[]) {
        $locale = app()->getLocale();

        foreach ($cats as $item) {
            $result[] = Category::where('id',$item)->with(['lyrics' => function($q) use($locale) {
                    if($locale == 'ru') $q->where('lang', 1)->where('is_published', 1)->get();
                    else $q->where('lang', 0)->where('is_published', 1)->get();
                  }])->get();
        }
        return $result;
    }

    public static function getSelectedCategory($category_id = 0) {
        $locale = app()->getLocale();
        $result = self::with(['lyrics' => function($q) use($locale) {
                    if($locale == 'ru') $q->where('lang', 1)->where('is_published', 1)->take(40);
                    else $q->where('lang', 0)->where('is_published', 1)->take(40);
                  }]);
                  $result->where('id', $category_id);
        return $result->first();
    }

      public function mb_ucfirst($str, $encoding = "UTF-8", $lower_str_end = false) {
          $first_letter = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding);
          $str_end = "";
          if ($lower_str_end) {
            $str_end = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encoding), $encoding), $encoding);
          }
          else {
            $str_end = mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
          }
          $str = $first_letter . $str_end;
          return $str;
      }

    public function getNameAttribute($value) {
        return $this->mb_ucfirst(trim(mb_strtolower($value)));
    }
    public function getNameKkAttribute($value) {
        return $this->mb_ucfirst(trim(mb_strtolower($value)));
    }
}
