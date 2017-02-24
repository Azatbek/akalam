<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'image','gallery_id','description', 'description_kk'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    public function gallery() {
    	return $this->belongsTo('App\Models\Gallery', 'gallery_id');
    }
}
