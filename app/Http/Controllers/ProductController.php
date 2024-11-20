<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function index(){
        return view('products.list');
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
            
        ];
        if ($request->image != "") {
            $rules ['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }


        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {               
            $image = $request->image;
            $ext = $image->getClientOriginalExtention();
            $imageName =time().'.' .$ext;

            $image->move(public_path('uploads/products'),$imageName);
        // save image in db
        
            $product->image = $imageName;
            $product->save();
        }
        
        
        return redirect()->route('products.index')->with('success','Product Added Successfully.');
    }

    public function edit() {

    }

    public function update() {

    }

    public function delete() {

    }
}
