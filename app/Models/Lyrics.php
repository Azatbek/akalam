<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
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
        return Lyrics::orderBy('id', 'desc')->take($limit)->where('lang', 1)->where('category_id', 'IN', [13,14,15,16,17,18,19])->select('id', 'title', 'content', 'created_at', 'hits')->paginate(12);
      } else {
        return Lyrics::orderBy('id', 'desc')->take($limit)->where('lang', 0)->where('category_id', 'IN', [13,14,15,16,17,18,19])->select('id', 'title', 'content', 'created_at', 'hits')->paginate(12);
      }
    }
    public static function bestLyrics() {
      $lyrics = new Lyrics;
      $locale = app()->getLocale();
      if($locale == 'ru') return $lyrics->where('lang', 1)->where('is_published', 1)->where('category_id', 'IN', [13,14,15,16,17,18,19])->orderBy('hits', 'desc')->take(5)->get();
      else return $lyrics->where('lang', 0)->where('is_published', 1)->where('category_id', 'IN', [13,14,15,16,17,18,19])->orderBy('hits', 'desc')->take(5)->get();
    }
    public static function lastLyrics() {
      $lyrics = new Lyrics;
      $locale = app()->getLocale();
      if($locale == 'ru') return $lyrics->where('lang', 1)->where('is_published', 1)->where('category_id', 'IN', [13,14,15,16,17,18,19])->orderBy('created_at', 'desc')->take(5)->get();
      else return $lyrics->where('lang', 0)->where('is_published', 1)->where('category_id', 'IN', [13,14,15,16,17,18,19])->orderBy('created_at', 'desc')->take(5)->get();
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
}
