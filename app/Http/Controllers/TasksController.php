<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function tasks_view(){
        if(Auth::check() == false){ return redirect('/login'); }

        return view('tasks');
    }
}
