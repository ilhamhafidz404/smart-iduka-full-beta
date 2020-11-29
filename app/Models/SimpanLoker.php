<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpanLoker extends Model
{
    use HasFactory;

    protected $table = 'simpan_loker';

    protected $fillable = ['user_id','post_id'];

     public function loker()
    {
        return $this->BelongsTo('App\Models\PostLoker','post_id','id');
    }

}
