<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function Logout(){
    auth()->logout();

    session()->flash('message', 'Some goodbye message');

    return redirect('/login');
  }
}
