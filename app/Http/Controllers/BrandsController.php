<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function show(){
        $list = Brand::all();
        return view('brand/list', ['brands' => $list]);
    }
}
