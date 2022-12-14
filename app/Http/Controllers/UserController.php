<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
 

    public function login(){
        return view('login.index', ['title' => 'login']);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'nip' => 'required|max:18|min:18',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/home-simpeg');
        }

        return back()->with('loginError', 'login Failed!');
    }

    public function index(){

        $data = DB::table('users')->select('nama', 'roles', 'nip', 'id')->orderBy('nama', 'asc')->get();

        return view('pengaturan.pengguna.index', compact('data'));
    }

    public function widget(){
        return view('dashboard.index');
    }


    public function store(Request $request){
        $validatedDate = $request->validate([
            'nip' => 'required|max:18|min:18',
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6',
        ]);

        $validatedDate['password'] = bcrypt($validatedDate['password']);

        User::create($validatedDate);

        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan user!');

        return redirect('/pengguna');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect('/pengguna')->with('successDelete', 'User has been deleted!');
    }

    public function edit(Request $request, $id){
        if($request->isMethod('POST')){
            $user = $request->all();

            User::where(['id'=>$id])->update(['nama'=>$user['nama'],'nip'=>$user['nip'],'roles'=>$user['roles']]);

            return redirect()->back()->with('update_success', 'Update data berhasil!');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
