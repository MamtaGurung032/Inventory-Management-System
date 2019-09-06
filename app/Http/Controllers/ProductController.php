<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Tag;


class ProductController extends Controller
{
    Public function index()
    {
        $products = Product::all();
        //die('product controller');
     //   return view('products.index');
    // $categories = Category::all();
     return view('products.index', compact('products'));
    }

    Public function add()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('products.add', compact('categories','tags'));
    }


    Public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required|boolean',
            'category_id'=> 'required|exists:categories,id'
            
        ]);

        $input = $request->all();
        $product = Product::create($input);
        //dd($product);

            if($request->has('tags'))
            {
                $product->tags()->sync($request->tags);
            }
        $tags = Tag::create($input);

        session()->flash('message', 'Product created successfully.');

      return redirect(url('/products'));
    }

    Public function edit(Product $product)
    {
        //$product = Product::find($product);
        $categories = Category::all();
        $tags = Tag::all();


        return view('products.edit', compact('product','categories','tags'));
        
//    return view('products.edit', compact('categories'));
    }


    Public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required',
            'price' => 'required|numeric|between:0.00,9999.99',
            'status' => 'required|boolean',
            'category_id'=> 'required|exists:categories,id'
        ]);

        //$product = Product::find($product);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->save();

        session()->flash('message', 'Product updated successfully.');

        return redirect(url('/products'));
    }

    Public function destroy(Product $product)
    {
//        Product::find($product)->delete();
        $product->delete();

        session()->flash('message', 'Product deleted successfully.');

        return redirect(url('/products'));
    }

    Public function search(Request $request)
    {
        
        $input = $request->get('name');
       // dd($input);
     //$products = \App\Product::where('name','like',"%{$input}")->get();
   
     $products = \App\Product::where('name','like','%'.$input.'%')->orWhere('description','like','%'.$input.'%')->
     orWhere('price','=',$input)->
     get();
   
     //$products = \App\Product::where('description',$input1)->get();
    
     return view('products.index',compact('products'));
    }                                                                                               
   

}
