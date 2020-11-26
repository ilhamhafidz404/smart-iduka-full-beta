<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

     public function foto()
    {
      if(!$this->foto){
        return asset('foto-profile-user/image.png');
      }
        return asset('foto-profile-user/'.$this->foto);
    }

    public function name()
    {
    	if(!$this->name){
        return 'User';
      }
        return $this->name;
    }

}
