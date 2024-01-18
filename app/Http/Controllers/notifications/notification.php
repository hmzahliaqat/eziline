<?php

namespace App\Http\Controllers\notifications;

use App\Http\Controllers\Controller;
use App\Models\notification as ModelsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class notification extends Controller
{


    public function getNotifications(){
       $notifications= ModelsNotification::where('user_id',Auth::id())->get();
       return $notifications;
    }

}
