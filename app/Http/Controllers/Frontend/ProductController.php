<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::orderBy('id', 'desc')->paginate(15);
        return view('frontend.products.index')->with('products',$products);
    }
    public function show($id)
    {
        $product=Product::find($id);
        if (!is_null($product)){
            return view('frontend.products.show', compact('product'));
        }
        else{
            session()->flash('errors','Sorry !! There is no product by this URL');
            return redirect()->route('products.index');
        }
        //Using Slug
//        $product=Product::where('slug', $slug)->first();
////        dd($product);
//        if (!is_null($product)){
//            return view('frontend.products.show', compact('product'));
//        }
//        else{
//            session()->flash('errors','Sorry !! There is no product by this URL');
//            return redirect()->route('products.index');
//        }
    }
}
