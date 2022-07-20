<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CartItem;
use Illuminate\Http\Request;


class CartController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }
    // User adds to cart
    public function store(Request $request) {
        if (auth()->user()->role != 'customer')
            abort(403, 'This route is only meant for customers.');

        auth()->user()->cartItems()->create([
            'menu_id' => $request->menuID,
            'quantity' => 1,
        ]);

        return back()->with('success', "{$request->menuName} added to cart.");
    }
}
