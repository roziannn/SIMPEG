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
            return redirect()->intended('/kehadiran');
        }

        return back()->with('loginError', 'login Failed!');
    }

    public function add_user(){
        $show_all = DB::table('users')->select('nama', 'roles', 'id', 'nip')->orderBy('nama', 'asc')->get();

        return view('dashboard.user.add_user',['show_all'=>$show_all]);
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

        return redirect('/add-new-user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}