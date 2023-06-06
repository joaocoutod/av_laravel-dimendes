<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function perfil_view($id){ 

        $user = User::where('id', $id)->First();
        
        if($user){
            return view('/user/perfil', ['user' => $user]);
        }else {
            return redirect('/login');
        }

    }

}
