<?php

namespace App\Http\Controllers\likes;

use App\Http\Controllers\Controller;
use App\Models\likes;
use App\Models\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class like extends Controller
{
    public function toggleLike($id){

$tasks=tasks::find($id);

$alreadyLiked=$tasks->like()->where('user_id',Auth::id())->exists();

if($alreadyLiked){

    $dislike=$tasks->like()->where('user_id',Auth::id())->delete();

    if($dislike){
    $tasks->update(['likes'=>DB::raw('likes-1')]);

    }

}else{

$like=likes::create([
    'user_id'=>Auth::id(),
    'tasks_id'=>$id,
]);

if($like){
    $tasks->update(['likes'=>DB::raw('likes+1')]);
}

}



    }
}
