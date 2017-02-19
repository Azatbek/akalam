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

    public static function getNews($limit = 0){
      if(app()->getLocale()=='ru') {
        return News::orderBy('id', 'desc')->where('press',0)->take($limit)->select('id', 'title', 'description', 'anons', 'poster', 'hits', 'created_at')->paginate(12);
      } else {
        return News::orderBy('id', 'desc')->where('press',0)->take($limit)->select('id', 'title_kk as title', 'description_kk as description', 'anons_kk as anons', 'poster', 'hits', 'created_at')->paginate(12);
      }
    }
    public static function getPressNews($limit = 0){
      if(app()->getLocale()=='ru') {
        return News::orderBy('id', 'desc')->where('press',1)->take($limit)->get();
      } else {
        return News::orderBy('id', 'desc')->where('press',1)->take($limit)->get();
      }
    }
}
