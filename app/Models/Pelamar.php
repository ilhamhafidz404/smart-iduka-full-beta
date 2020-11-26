<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamar';

    protected $guarded = [];

     public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function profile()
    {
        return $this->belongsTo('App\Models\Profile','user_id','user_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\ProfileCompany','company_id','id');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\PostLoker','post_id','id');
    }

}
