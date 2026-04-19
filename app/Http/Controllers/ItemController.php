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
        return redirect('/')->with('error', 'Please login');
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

    public function craftItems()
    {
        $user = $this->user();
        if ($user) {
            $woodCount = $user->items()->where('catalog_id',1)->count();

            if ($woodCount < 3) {
                return redirect('/inventory/list')->with('error','Need 3 wood');
            }

            $user->items()->where('catalog_id',1)->limit(3)->delete();
            $user->items()->create(['catalog_id'=>4]);
        }
        return redirect('/')->with('success','Your item was created!');
    }

    public function destroy($id)
    {
        $user = $this->user();
        if ($user) {
            $item = $user->items()->findOrFail($id);
            $item->delete();
            return back()->with('success','Item was deleted');
        }
        return redirect('/')->with('error', 'Please login');
    }
}

