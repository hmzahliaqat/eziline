<?php

namespace App\Http\Controllers\tasks;

use App\Http\Controllers\Controller;
use App\Models\tasks;
use Illuminate\Http\Request;

class delete extends Controller
{
    public function deleteTask($id){

$task=tasks::find($id);
$task->delete();

    }
}
