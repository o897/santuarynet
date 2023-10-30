<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['label','created_at','updated_at'];
}
