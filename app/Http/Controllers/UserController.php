<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // изменённые методы (home, username, logout, coins) - ИИШКА их отредактировала, остальное - без изменений
    public function home()
    {
        $user = session('user_id') ? User::find(session('user_id')) : null;
        $products = Catalog::all();
        return view('user.home', compact('user','products'));
    }

    public function username(Request $request)
    {
        $request->validate(['name' => 'required|string|min:1|max:255']);
        $user = User::firstOrCreate(['name' => $request->name]);
        session(['user_id' => $user->id]);

        Auth::login($user);

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
        $user = $this->findUser();
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
