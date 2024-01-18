<?php

namespace App\Http\Controllers\tasks;

use App\Http\Controllers\Controller;
use App\Models\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class task extends Controller
{
    public function create(Request $request){

        tasks::create([

            'taskName'=>$request->taskName,
            'discription'=>$request->discription,
            'status'=>$request->status,
            'user_id'=>Auth::id(),

        ]);
    }



public function getTasks(){

  $tasks = tasks::with(['user','like'=>function($query){
    $query->where('likes.user_id',Auth::id());
  }])->paginate(10);

  return $tasks;
}

public function taskDetails($id){

    $task=tasks::where('id',$id)->with(['user','comment'=>function($query){
        $query->join('users','users.id','=','comments.user_id');
    }])->first();

     return $task;
}

}
