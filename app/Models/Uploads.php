<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    use HasFactory;

    protected $table = 'uploads';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\user','user_id','id');
    }
}
