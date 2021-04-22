<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if (Auth::user()->role == 'Admin')
        {
            $user = User::all();
            return view('admin.index')->with('user', $user);
        } else {
            return redirect('home');
        }

    }

    public function edit($id, $newRole){
        if (Auth::user()->role == 'Admin')
        {
            $user = User::find($id);
            $user->role = $newRole;
            $user->save();
            $userall = User::all();
            return redirect('admin')->with('user', $userall);
        } else {
            return redirect('home');
        }

    }

}
