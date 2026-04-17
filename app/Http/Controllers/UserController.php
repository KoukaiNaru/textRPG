<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function username(Request $request)
    {
        $request->validate(['name' => 'required|string|min:1|max:255']);
        $user = User::where('name', $request->name)->first();
        if ($user) {
            session(['user_id' => $user->id]);
            return redirect('/')->with('success', 'Welcome back!');
        } else {
            $user = User::create(['name' => $request->name]);
            session(['user_id' => $user->id]);
        }
        return redirect('/');
    }

    public function logout()
    {
        session()->flush();
        session()->regenerate();

        return redirect('/');
    }
}
