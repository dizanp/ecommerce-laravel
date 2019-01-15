<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin/product.index', compact('products'));

        // $productsw = Product::all();
        // return view('/', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|min:3',
            'price' => 'required|min:4',
            'image' => 'mimes:jpeg,jpg,png|max:2000'
        ]);

        //validasi slug
         $slug = str_slug($request->name, '-');
        //cek slug ngga kembar
        if(Product::where('slug', $slug)->first() != null)
          $slug = $slug . '-' . time();

        //upload image
        $fileName = time() . '.png';
        $request->file('image')->storeAs('public/images', $fileName);

        $product = Product::create([
          'name'         => $request->name,
          'image'        => $fileName,
          'slug'         => $slug,
          'price'        => $request->price,
          'description'  => $request->description, 
          'user_id'      => Auth::user()->id
        ]);

         return redirect('/admin/product')->with('msg', 'product berhasil di submit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        return view('/admin/product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|min:3',
            'price' => 'required|min:4',
            'image' => 'mimes:jpeg,jpg,png|max:2000'
        ]);

        $products = Product::find($id);
        $fileName =  $products->image;
        //dd($fileName);
        if(Product::where('image',$fileName) == $fileName){
            $fileName = $products->image;
        }
        else{
            $fileName = time() . '.png';
            $request->file('image')->storeAs('public/images', $fileName);
        }

        $product = Product::findOrFail($id);
        $product->Update([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $fileName
        ]);

        return redirect('/admin/product')->with('msg', 'product berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/admin/product')->with('msg', 'product berhasil di hapus');
    }
}
