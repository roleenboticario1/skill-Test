<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    
    public function index()
    {
      return view('category.categories');
    }

    public function categories(){
      $categories = Category::all();
      return json_encode(array('data'=>$categories ));
    }

    public function create()
    {   
        return view('category.create');
    }

    public function store(CategoryRequest $request){
        
        $data = $request->validated();
    
        $posts = new Category;
        $posts->name = $data['name'];
        $posts->save();
     
        return redirect()->back()->with('success','Category created successfully.');
    }
}
