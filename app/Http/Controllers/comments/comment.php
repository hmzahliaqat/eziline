<?php

namespace App\Http\Controllers\comments;

use App\Events\commentEvent;
use App\Events\commentNotifyEvent;
use App\Http\Controllers\Controller;
use App\Models\comments;
use App\Models\notification;
use App\Models\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class comment extends Controller
{
    public function create($id,Request $request){
  $comment= comments::create([
        'user_id'=>Auth::id(),
        'tasks_id'=>$id,
        'body'=>$request->body,
     ]);
     $task=tasks::find($id);
    $userid= $task->user_id;

     $reciever=$task->user->id;
     $recieverName=$task->user->name;
     $name=auth()->user()->name;

     $body=$request->body;
event(new commentEvent(['body'=>$body ,'reciever'=>$reciever,'name'=>$name]));

if($userid!=Auth::id()){
    $notification=$name.' posted a commented on your task';
notification::create([

    'body'=>$notification,
    'user_id'=>$reciever,

]);

broadcast(new commentNotifyEvent(['notification'=>$notification ,'owner'=>$reciever]));


}



    }
}
