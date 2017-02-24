<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'name', 'name_kk', 'description', 'description_kk', 'is_published'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    public function images() {
    	return $this->hasMany('App\Models\Images','gallery_id','id');
    }

    public static function getGallery($limit = 0){
      if(app()->getLocale()=='ru') {
        return Gallery::where('is_published',1)->with('images')->orderBy('id','desc')->paginate(12);
      } else {
        return Gallery::where('is_published',1)->with('images')->orderBy('id','desc')->select('id', 'name_kk as name', 'description_kk as description', 'created_at')->paginate(12);
      }
    }
}
