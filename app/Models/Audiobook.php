<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Audiobook extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'readers', 'file', 'hits', 'is_published', 'category_id','lang',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    public function category() {
      return $this->belongsTo('App\Models\AudioCategories', 'category_id');
    }

    public static function getAudiobooks($limit = 0) {
        if(app()->getLocale()=='ru') {
        return Audiobook::orderBy('id', 'desc')->take($limit)->where('lang', 1)->paginate(12);
      } else {
        return Audiobook::orderBy('id', 'desc')->take($limit)->where('lang', 0)->paginate(12);
      }
    }
    public static function getAudiobooksByCat($limit = 0, $cat = null) {
        if(app()->getLocale()=='ru') {
        return Audiobook::orderBy('id', 'desc')->take($limit)->where('lang', 1)->where('category_id',$cat)->paginate(12);
      } else {
        return Audiobook::orderBy('id', 'desc')->take($limit)->where('lang', 0)->where('category_id',$cat)->paginate(12);
      }
    }
}
