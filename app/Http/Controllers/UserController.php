<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('User.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate(
            [
                'name'      =>  'required | unique:users',
                'username'  =>  'required | unique:users',
                'email'     =>  'required | email',
                'phone'     =>  'required',
                'address'   =>  'required',
                'role'       =>  'required',
                'status'    =>  'required',
                'password'  =>  'required|min:6|confirmed'
            ]);

       //Hash Password
       $validData['password'] = bcrypt($validData['password']);
       // Create user
        $user = User::create($validData);
        //Login
        //auth()->login($user);
        //Return

        return redirect('/')->with('success', 'Creado Exitosamente!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('User.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
       //dd($request);
       // dd($user);

        $validData = $request->validate(
            [
                'name'      =>  'required',
                'username'  =>  'required',
                'email'     =>  'required',
                'phone'     =>  'required',
                'address'   =>  'required',
                'role'       =>  'required',
                'status'    =>  'required',
                'password'  =>  'required|min:6|confirmed'
            ]);

            $user->update($validData);
            return redirect('User')->with('success', 'Edición Exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('User')->with('success', 'Eliminación Exitosa!');
    }

    public function login(){
        return view('User.login');
    }

    public function authenticate(Request $request)
    {
        //dd($request);
        $validData = $request->validate(
            [
                'email'    => 'required | email',
                'password' => 'required | min:6'
            ]);

            if(auth()->attempt($validData))
            {
                $request->session()->regenerate();
                return redirect('/');
            }
            return back();
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
