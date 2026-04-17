<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function user()
    {
      $user = session('user_id');
      return User::find($user);
    }

    public function item()
    {
        $user = $this->user();
        if ($user) {
            $items = $user->items()->get();
            return view('items.info', compact('items'));
        }
        return redirect('/')->with('error','Please login');
    }

    public function show($id)
    {
        $user = $this->user();
        if ($user) {
            $item = $user->items()->findOrFail($id);
            return view('items.show', compact('item'));
        }
        return redirect('/')->with('error', 'Please, login');
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $user = $this->user();
        if ($user) {
            $validWeapon = $request->validate([
                'title' => 'required|string|max:255|unique:items',
                'description' => 'nullable|string',
                'power' => 'required|integer|min:1|max:100',
            ]);
            $user->items()->create($validWeapon);
        }
        return redirect('/');
    }

    public function destroy($id)
    {
        $user = $this->user();
        if ($user) {
            $item = $user->items()->findOrFail($id);
            $item->delete();
            return redirect('/')->with('success','Item was deleted');
        }
        return redirect('/')->with('error','Please login');
    }
}

