<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    protected $fillable=[

        'tasks_id',
        'user_id',
        'body',

    ];

    public function task(){
        return $this->belongsTo(tasks::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
