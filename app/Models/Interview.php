<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $table = 'interview';

    protected $guarded = [];

    public function pelamar()
    {
        return $this->belongsTo('App\Models\Pelamar','pelamar_id','id');
    }


}
