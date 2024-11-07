<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Roles;
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
            return redirect('/');
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
        $roles = Roles::all();
        $users = User::orderBy('id', 'asc')->paginate(10);
        return view('users.index',['users' => $users,'roles' => $roles]);
    }
    public function create()
    {
        $roles = Roles::all();
        return view('users.create',["roles" => $roles]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required',
        ]);
        $role = User::create($data);
        $role->roles()->attach($request->roles);

        return redirect(route('user'))->with('create', 'Created');
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' .$user->id,
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles()->sync($request->roles);
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
