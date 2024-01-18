<?php

namespace App\Http\Controllers\tasks;

use App\Http\Controllers\Controller;
use App\Models\tasks;
use Illuminate\Http\Request;

class search extends Controller
{
    public function searchTasks($query){

        $result=tasks::where('taskName','like','%'.$query.'%')->orWhere('discription','like','%'.$query.'%')->get();

        return $result;

    }
}
