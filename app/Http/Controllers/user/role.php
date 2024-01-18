<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class role extends Controller
{
    public function getUserRole(){

        $userRole=auth()->user()->role;
        return $userRole;

    }
}
