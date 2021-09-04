<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Categories;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $list = Product::all();
        return view('product/list', ['products' => $list]);
    }

    function form($id = null){
        $product = new Product();
        $brands = Brand::all();
        $category = Categories::all();
        if($id!=null){
            $product = Product::findOrFail($id);
        }
        return view('product/form',[
            'product' => $product, 
            'brands' => $brands,
            'categories' => $category,
        ]);
    }

    function save(Request $request){
        //$_POST['name']

        //Validaciones del formulario
        $request->validate([
            "name"=>'required|max:50',
            "cost"=>'required|numeric',
            "price"=>'required|numeric',
            "quantity"=>'required|numeric',
            "brand"=>'required|max:50',
            "categories"=>'required|max:50',
        ]);

        $product = new Product();
        if($request->id > 0){
            $product = Product::findOrFail($request->id);
        }
        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;
        $product->category_id = $request->brand;

        $product->save();

        return redirect('/products')->with('message','Producto Guardado Correctamente');
    }

    function delete($id){
        //select * from products where id=$id;
        $product = Product::findOrFail($id);
        $product->delete();

        //Product::destroy([1,2,3,4]);

        return redirect('/products')->with('message','Producto Eliminado Correctamente');
    }
}
