<?php

namespace App\Http\Controllers\tasks;

use App\Http\Controllers\Controller;
use App\Models\tasks;
use Illuminate\Http\Request;

class update extends Controller
{


    public function updateTaskInstance($id){
       $task = tasks::find($id);
    return $task;
    }


    public function updateTask($id,Request $request){

        $task=tasks::find($id);
        $task->taskName=$request->taskName;
        $task->status=$request->status;
        $task->discription=$request->discription;

        $task->save();


    }

}
