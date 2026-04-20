<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

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

    /** Не трогать, пожалуйста, нерабочий код */

//    public function craft($id)
//    {
//        $user = $this->user();
//        if ($user) {
//            $recipe = DB::table('recipes')->where('item_id',5)->get();
//            dd($recipe);
//        }
//        return redirect('/')->with('success','Your item was created!');
//    }

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

