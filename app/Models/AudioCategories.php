<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AudioCategories extends Model
{
    protected $table = 'audiocategories';
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
    public static function getCategoriesTree() {
      $elements = AudioCategories::get()->toArray();
      $tree = self::buildTree($elements);
      return $tree;
    }
    public function subcategory() {
      return $this->hasMany('App\Models\AudioCategories', 'parent_id');
    }
    public function parent() {
      return $this->belongsTo('App\Models\AudioCategories', 'parent_id');
    }
}