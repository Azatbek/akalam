<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisements';

    protected $fillable = ['name', 'link', 'src', 'src_pic', 'type', 'lang'];

    protected $hidden = ['updated_at'];

    public static function getAdv($limit=0) {
    	if(app()->getLocale()=='ru') return Advertisement::where('is_published', 1)->where('lang',1)->take($limit)->orderBy('created_at','desc')->get();
    	else return Advertisement::where('is_published', 1)->where('lang',0)->take($limit)->orderBy('created_at','desc')->get();
    }
    public function getSrcAttribute($value){
    	$strpos = strpos($value, '=');
    	$strlen = strlen($value);
    	return substr($value, $strpos+1, $strlen);
    }
}
