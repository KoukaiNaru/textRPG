<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function username(Request $request)
    {
        $request->validate(['name' => 'required|string|min:1|max:255']);
        $user = User::firstOrCreate(['name' => $request->name]);
        session(['user_id' => $user->id]);
        return redirect('/');
    }

    public function findUser()
    {
        return User::find(session('user_id'));
    }

    public function logout()
    {
        session()->flush();
        session()->regenerate();

        return redirect('/');
    }
    public function coins()
    {
        $user = User::find(session('user_id'));
        $randomId = rand(1,10);
        $user->increment('coins',$randomId);
        return back();
    }

    public function gather()
    {
        $user = $this->findUser();
        if ($user) {
        $randomId = rand(1,3);
        $user->items()->create(['catalog_id' => $randomId]);
        return back()->with('success','Your received item!');
            }
        return redirect('/')->with('error','Please, login!');
    }
}
