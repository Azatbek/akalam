<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Lyrics extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'lang', 'content', 'category_id', 'author', 'is_published'
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
      return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public static function getLyrics($limit = 0) {
      if(app()->getLocale()=='ru') {
        return News::orderBy('id', 'desc')->take($limit)->where('lang', 1)->select('title', 'content')->paginate(12);
      } else {
        return News::orderBy('id', 'desc')->take($limit)->where('lang', 0)->select('title', 'content')->paginate(12);
      }
    }
    public static function bestLyrics() {
      $lyrics = new Lyrics;
      $locale = app()->getLocale();
      if($locale == 'ru') return $lyrics->where('lang', 1)->where('is_published', 1)->orderBy('hits', 'desc')->take(5)->get();
      else return $lyrics->where('lang', 0)->where('is_published', 1)->orderBy('hits', 'desc')->take(5)->get();
    }
}
