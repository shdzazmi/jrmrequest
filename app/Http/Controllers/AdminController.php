<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\User;
use App\Repositories\karyawanRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private array $auth = array('Master', 'Dev');
    private $karyawanRepository;

    public function __construct(karyawanRepository $karyawanRepo)
    {
        $this->karyawanRepository = $karyawanRepo;
        $this->middleware('auth');
    }

    public function index(){
        if (in_array(Auth::user()->role, $this->auth))
        {
            $user = User::all();
//            $karyawans = $this->karyawanRepository->paginate(25);
            $karyawans = karyawan::paginate(20);
            return view('admin.index')->with('user', $user)->with('karyawans', $karyawans);
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

        if (in_array(Auth::user()->role, $this->auth))
        {
            $user = User::find($request->id);
            if ($user != ""){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role = $request->role;
                $user->divisi = $request->divisi;
                $user->save();
            }
            $userall = User::all();
            return redirect('admin')->with('user', $userall);
            return null;
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
