<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');

    }

    public function store(Request $request)
    {
//        phpinfo();
//                        dd(sys_get_temp_dir());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'gender' => 'required|in:Male,Female',
            'born' => 'required|date',
//            'avatar'=>'image|mimes:jpeg,bmp,png',
            'avatar' => 'nullable|image',

        ]);
        if ($request->hasFile('avatar')) {
            $folder = date('Y-m-d');
            $avatar = $request->file('avatar')->store("images/{$folder}");
        }
//                dd($request->all());


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'born_date' => $request->born,
            'avatar' => $avatar ?? null,

        ]);
        $request->session()->flash('status', 'Successfull registration');
        Auth::login($user, true);

        return redirect()->home();
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->home();
        }

        return redirect()->back()->with('error', 'Incorrect login or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }

}
