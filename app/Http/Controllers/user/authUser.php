<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authUser extends Controller
{
    public function getAuthUser(){
        $user=Auth::id();
        return $user;
    }
}
