<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = ['id','post_id','user_id','content','created_at','updated_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');

    }

}

