<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLoker extends Model
{
    use HasFactory;

    protected $table = 'post_loker';

    protected $guarded = [];

    public function kategori()
    {
    	return $this->belongsTo('App\Models\Kategori');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User','user_id','id');
    }

    // public function companyProfile()
    // {
    //     return $this->belongsTo('App\Models\ProfileCompany','user_id','user_id');
    // }

}
