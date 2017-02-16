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
        'title', 'lang', 'content', 'author', 'is_published'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

}
