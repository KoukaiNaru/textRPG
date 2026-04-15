<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function item()
    {
        $items = Item::all();
        return view('items.info', ['items' => $items]);
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('items.show', ['item' => $item]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validWeapon = $request->validate([
            'title' => 'required|string|max:255|unique:items',
            'description' => 'nullable|string',
            'power' => 'required|integer|min:1|max:100',
            ]);

        Item::create($validWeapon);

        return redirect('/');
    }

}

