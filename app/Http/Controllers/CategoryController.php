<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
//use App\Product;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
       // die('category controller');
        //return view('categories.index');

        //$tasks=['task1','task2','task3'];
        return view('categories.index', compact('categories')); //compact creates array


    }


    public function add()
    {
        return view('categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'status' => 'required|boolean'
        ]);


        $input = $request->all();
        $category = Category::create($input);
        //dd($request->all());
        session()->flash('message', 'Category created successfully.');

        return redirect(url('/categories'));
    }

    public function edit($category)
    {
    
        $category = Category::find($category);
        //dd($category);
        return view('categories.edit', compact('category'));
    }
    
    public function update(Request $request, $category)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'status' => 'required|boolean'
        ]);
        //dd($request->all();
        $category = Category::find($category);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        session()->flash('message', 'Category updated successfully.');

        return redirect(url('/categories'));
    }

    public function destroy($category)
    {
        Category::find($category)->delete();

        session()->flash('message', 'Category deleted successfully.');

        return redirect(url('/categories'));
    }

    public function category($category)
    {                
        $products = \App\Product::where('category_id',$category)->get();
        return view('products.index',compact('products'));
    }

    public function search(Request $request)
    {
        $input = $request->get('name');
        $categories = \App\Category::where('name','like','%'.$input.'%')->get();
        return view('categories.index',compact('categories'));

    }
}
