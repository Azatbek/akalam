<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'title_kk', 'anons', 'anons_kk', 'description', 'description_kk', 'poster', 'press',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    public static function getNews($limit = 0, $paginate = false){
      if(app()->getLocale()=='ru') {
               $news = News::where('press',0)->orderBy('id', 'desc')->select('id', 'title', 'description', 'anons', 'poster', 'hits', 'created_at');
               $news = $paginate ? $news->paginate(12) : $news->take($limit)->get();
        return $news;
      } else {
        $news = News::where('press',0)->orderBy('id', 'desc')->select('id', 'title_kk as title', 'description_kk as description', 'anons_kk as anons', 'poster', 'hits', 'created_at');
        $news = $paginate ? $news->paginate(12) : $news->take($limit)->get();
        return $news;
      }
    }
    public static function getPressNews($limit = 0){
      if(app()->getLocale()=='ru') {
        return News::orderBy('id', 'desc')->where('press',1)->take($limit)->get();
      } else {
        return News::orderBy('id', 'desc')->where('press',1)->select('id', 'title_kk as title', 'description_kk as description', 'anons_kk as anons', 'poster', 'hits', 'created_at')->take($limit)->get();
      }
    }
    public static function getPopularNews($limit = 0){
      if(app()->getLocale()=='ru') {
        return News::orderBy('hits', 'desc')->take($limit)->get();
      } else {
        return News::orderBy('hits', 'desc')->select('id', 'title_kk as title', 'description_kk as description', 'anons_kk as anons', 'poster', 'hits', 'created_at')->take($limit)->get();
      }
    }
}
