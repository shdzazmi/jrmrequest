<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private array $auth = array('Master', 'Dev');

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if (in_array(Auth::user()->role, $this->auth))
        {
            $user = User::all();
            return view('admin.index')->with('user', $user);
        } else {
            return redirect('home');
        }

    }

    public function edit($id, $newRole){
        if (in_array(Auth::user()->role, $this->auth))
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

    public function update(Request $request){

        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("Data =  $request->id");
        if (in_array(Auth::user()->role, $this->auth))
        {
            $user = User::find($request->id);
            if ($user != ""){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role = $request->role;
                $user->save();
            }
            $userall = User::all();
            return redirect('admin')->with('user', $userall);
        } else {
            return redirect('home');
        }
    }

    public function show(Request $request){

        if (in_array(Auth::user()->role, $this->auth))
        {
            $user = User::firstWhere('id', $request->id);
            if ($user != ""){
                return $user;
            } else {
                return "user not find";
            }

        } else {
            return redirect('home');
        }
    }

    public function create(Request $request)
    {
        if (in_array(Auth::user()->role, $this->auth))
        {
            User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),]);
            return redirect('admin');
        } else {
            return redirect('home');
        }

    }

}
