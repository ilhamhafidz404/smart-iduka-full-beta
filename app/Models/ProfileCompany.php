<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileCompany extends Model
{
    use HasFactory;

    protected $table = 'profile_company';

    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function logo()
    {
      if(!$this->logo){
        return asset('logo-perusahaan/image.png');
      }
        return asset('logo-perusahaan/'.$this->logo);
    }

    public function name()
    {
        if(!$this->name){
        return 'Perusahaan';
      }
        return $this->name;
    }
}
