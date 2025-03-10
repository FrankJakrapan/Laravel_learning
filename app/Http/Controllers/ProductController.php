<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;

class ProductController extends Controller{
    public function list() {
       try{
           $products = Product::all(); //SELETE * FROM products

           return view('product.list', compact('products'));
       }catch(\Exception $e){
           return response()->json(['error' => $e->getMessage()], 500);
       }
    }

    public function form() {
        $productTypes = ProductType::orderBy('name', 'asc')->get();

        return view('product.form', compact('productTypes'));
    }

    public function save(Request $request) { 
        try{
            Product::create($request->all());

            return redirect('/product/list');
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($id) {
        try{
            $product = Product::find($id);
            $productTypes = ProductType::orderBy('name', 'asc')->get();

            return view('product.form', compact('product', 'productTypes'));
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }    
    }
    

    public function update(Request $request, $id) {
        try{
            $product = Product::find($id);
            $product->update($request->all());

            return redirect('/product/list');
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function remove($id) {
        try{
            $product = Product::find($id);
            $product->delete();
            
            return redirect('/product/list');
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (strlen($keyword) > 0) {
            $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        } else {
            $products = Product::all();
        }

        return view('product.list', compact('products', 'keyword'));
    }
    
    public function sort(Request $request) {
        $sort = "asc";
        $products = Product::orderBy('price', $sort)->get();

        return view('product.list', compact('products', 'sort'));   
    }

    public function priceMoreThan(){
        $price = 300;
        $sort = "asc";
        $products = Product::where('price', '>', $price)
        ->orderBy('price', $sort)
        ->get();

        return view('product.list', compact('products', 'sort'));
    }

    public function priceLessThan(){
        $price = 500;
        $sort = "asc";
        $products = Product::where('price', '<', $price)
        ->orderBy('price', $sort)
        ->get();

        return view('product.list', compact('products', 'sort'));
    }

    public function priceBetween(){
        $price1 = 300;
        $price2 = 3000;
        $sort = "asc";
        $products = Product::whereBetween('price', [$price1, $price2])
        ->orderBy('price', $sort)
        ->get();

        return view('product.list', compact('products', 'sort'));
    }

    public function priceNotBetween(){
        $priceFrom = 2000;
        $priceTo = 10000;
        $sort = "asc";
        $products = Product::whereNotBetween('price', [$priceFrom, $priceTo])
        ->orderBy('price', $sort)
        ->get();

        return view('product.list', compact('products', 'sort'));
    }

    public function priceIn(){
        $price = [1, 500, 2999];
        $sort = "asc";
        $products = Product::whereIn('price', $price)
        ->orderBy('price', $sort)
        ->get();

        return view('product.list', compact('products'));
    }

    public function priceMaxMinCountAvg(){
        $priceMax = Product::max('price');
        $priceMin = Product::min('price');
        $priceCount = Product::count();
        $priceAvg = Product::avg('price');

        return view('product.maxMinCountAvg', compact('priceMax', 'priceMin', 'priceCount', 'priceAvg'));
    }

    public function productTypeList(){
        $productTypes = ProductType::orderby('name', 'asc')->get();
     
        return view('product.productTypeList', compact('productTypes'));
    }

    public function listByProductType($productTypeId) {
        $productType = ProductType::find($productTypeId);

        // echo "<pre>";
        // print_r($productType);
        // echo "</pre>";exit;

        return view('product.listByProductType', compact('productType'));

    }

}
