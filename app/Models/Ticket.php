<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;



class Ticket extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['ticket_id','user_id','name', 'file', 'status' ,'title', 'content','label','categories','priority'];
    
    public $incrementing = false; 

    protected $primaryKey = 'ticket_id';
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

    }

    public function agent()
    {
        return $this->belongsTo(User::class,'agent_id');
    }
}
