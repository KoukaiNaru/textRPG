<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Item;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function buy($id)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('home')->with('error','Login first');
        }

        $product = Catalog::findOrFail($id);
        $user = auth()->user();

        if ($user->coins < $product->price) {
            return back()->with('error', 'Not enough gold');
        }
        $user->decrement('coins',$product->price);

        Item::create([
            'user_id' => $user->id,
            'catalog_id' => $product->id,
        ]);
        return back()->with('success', 'You received item');
    }
}
