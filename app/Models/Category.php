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
    public function lyrics() {
      $locale = app()->getLocale();
      if ($locale == 'ru') {
        return $this->hasMany('App\Models\Lyrics', 'category_id');
      } else {
        return $this->hasMany('App\Models\Lyrics', 'category_id');
      }
    }
    public static function getHomeSelectedCategories($cats=[]) {
        $result = self::with(['lyrics' => function($q) {
                    $locale = app()->getLocale();
                    if($locale == 'ru') $q->where('lang', 1)->where('is_published', 1)->take(5);
                    else $q->where('lang', 0)->where('is_published', 1)->take(5);
                  }])
                ->whereIn('id', $cats)->orderBy('id', 'asc')->get();
        return $result;
    }
}
