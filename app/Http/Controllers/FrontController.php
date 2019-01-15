<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class FrontController extends Controller
{
    //

      public function index()
    {
        $products = Product::paginate(6);
        return view('/welcome', compact('products'));
    }

    public function ascending()
    {
    	$products = DB::table('products')
                ->orderBy('price', 'asc')
                ->paginate(6);
        return view('/welcome', compact('products'));
    }

    public function descending()
    {
        $products = DB::table('products')
                ->orderBy('price', 'desc')
                ->paginate(6);
        return view('/welcome', compact('products'));
    }

    public function getAddtoCart(Request $request, $id)
    {
        $Product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect('/welcome');
    }
}
