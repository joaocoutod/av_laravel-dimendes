<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function perfil_view(){ 

        if(Auth::check() == true){ return view('/user/perfil'); }

        return redirect('/login'); 

    }

}
