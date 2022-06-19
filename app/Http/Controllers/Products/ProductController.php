<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
     public function index()
    {
       $products = Category::with('products')->get();
      // return view('dashboard',compact('products'));
      return json_encode(array('data'=>$products ));
    }

    public function create()
    {   
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    public function store(ProductRequest $request){
        
        $data = $request->validated();
    
        $products = new Product;
        $products->name = $data['name'];
        $products->price = $data['price'];
        $products->category_id = $data['category_id'];
        $products->save();
     
        return redirect()->back()->with('success','Product created successfully.');
    }

    public function edit($id)
    { 
      $products = Product::find($id);
      $categories = Category::all();
      return view('products.edit',compact(['products','categories']));
    }

    public function update(ProductRequest $request, $id){
        
        $data = $request->validated();

        $products = Product::find($id);
        $products->name = $data['name'];
        $products->price = $data['price'];
        $products->category_id = $data['category_id'];
        $products->update();
     
        return redirect()->back()->with('success','Product Updated successfully.');
    }

    public function destroy($id)
    {
        $delete = Product::find($id);
        $delete->delete();

        return redirect()->back()->with('success','Product Deleted successfully.');
    }
}
