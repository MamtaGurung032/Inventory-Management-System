<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Product;

class TagController extends Controller
{
    public function index(){

        $tags = Tag::all();
        //dd('$tags');
        return view ('tags.index', compact('tags'));
    }

    public function add(){
        return view('tags.add');
    }

    public function store(Request $request){

    $input = $request->all();
    $tag = Tag::create($input);
    return redirect(url('/tags'));
    }

    public function edit($tag){
    
        $tag = Tag::find($tag);             
        return view('tags.edit', compact('tag'));
    }


    public function update(Request $request, $tag){

        $tag = Tag::find($tag);
        $tag->name = $request->name;
        $tag->save();

        return redirect(url('/tags'));

    }

    public function destroy($tag)
    {
        Tag::find($tag)->delete();
        
        return redirect(url('/tags'));

    }

    public function filter(Tag $tag)
    {                
        $products = $tag->products;
        //$products = \App\Product::where('id',$tag)->get();
        return view('products.index',compact('products'));
    }



}
