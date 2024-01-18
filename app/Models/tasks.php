<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    use HasFactory;

    protected $fillable=[
        'taskName',
        'discription',
        'status',
        'user_id',
        'likes',
    ];



 public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(comments::class);
    }

    public function like(){
        return $this->hasMany(likes::class);
    }

}



