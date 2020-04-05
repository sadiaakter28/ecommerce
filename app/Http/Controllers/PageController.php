<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend.products.index');
    }
    public function contacts()
    {
        return view('frontend.contacts.index');
    }
}
