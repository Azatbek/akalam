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
        'title', 'title_kk', 'anons', 'anons_kk', 'description', 'description_kk', 'poster',
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
        return News::orderBy('id', 'desc')->take($limit)->select('title', 'description', 'anons', 'poster')->paginate(10);
      } else {
        return News::orderBy('id', 'desc')->take($limit)->select('title_kk as title', 'description_kk as description', 'anons_kk as anons', 'poster')->paginate(10);
      }
    }
}
