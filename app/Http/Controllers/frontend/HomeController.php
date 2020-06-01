<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $sliders=Slider::orderBy('priority', 'asc')->get();
        $products=Product::orderBy('id', 'desc')->paginate(15);
        return view('frontend.home.index', compact('products', 'sliders'));
    }


}
