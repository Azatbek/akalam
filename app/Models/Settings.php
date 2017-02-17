<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'user_settings';

    protected $fillable = ['parameter', 'values'];

    protected $hidden = ['updated_at', 'created_at'];
}
