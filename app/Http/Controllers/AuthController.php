<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function loginPage()
    {
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/student')->with('success', 'You are logged in successfully.');
        } else {
            return redirect('/login');
        }
    }
    public function registerPage()
    {
        return view('Auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $user = User::create($data);
        Auth::login($user);
        return redirect('/student')->with('success', 'You are registered successfully.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function index()
    {
        $users = User::all();
        return view('users.index',['users' => $users]);
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|max:255',
        ]);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('user');
    }

    public function destroy(Request $request, User $user)
    {
        $id = $request->id;
        $destroy = User::findOrFail($id);
        $destroy->delete();
        return redirect()->route('user');
    }
}
